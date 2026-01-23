# Partials Architecture - Handover Notes

> **For:** New Vite + React + Express + PostgreSQL Project
> **From:** LeanCMS BrandHub Client Project
> **Date:** January 2026

---

## 1. Executive Summary

This document describes a **partials architecture pattern** that provides clean, reusable, auto-discovering template components. The pattern separates layout logic, content data, and presentation while maintaining consistency across complex page structures.

**Key Benefits:**
- Auto-discovery of components (no manual registration)
- Consistent data flow with config wrapping
- Automatic CSS loading per component
- Client/tenant-specific overrides
- Clear naming conventions (BEM for styles)

---

## 2. Architecture Overview

### Core Concept

```
Page Template
    ↓
partial('component-name', { config })
    ↓
Registry looks up component
    ↓
Config auto-wrapped in expected key
    ↓
Component receives props, renders JSX
    ↓
CSS module auto-loaded
```

### Translation from PHP to React

| PHP (LeanCMS)                          | React (New Project)                      |
|----------------------------------------|------------------------------------------|
| `partial('hero', $config)`             | `<Partial name="hero" config={config} />`|
| `extract($hero_config)`                | Destructure props                        |
| `.php` files in `_partials/`           | `.tsx` files in `partials/`              |
| Auto-loaded `.css` files               | CSS Modules or co-located styles         |
| `RecursiveIteratorIterator`            | Vite's `import.meta.glob()`              |
| WordPress template inclusion           | React component rendering                |

---

## 3. Recommended File Structure

```
src/
├── partials/
│   ├── index.ts                    # Registry & Partial component
│   ├── types.ts                    # Shared TypeScript types
│   │
│   ├── top-section/
│   │   ├── index.ts                # Barrel export
│   │   ├── Hero.tsx
│   │   ├── Hero.module.css
│   │   ├── PageHeader.tsx
│   │   ├── PageHeader.module.css
│   │   └── Loader.tsx
│   │
│   ├── bottom-section/
│   │   ├── index.ts
│   │   ├── Cta.tsx
│   │   └── Cta.module.css
│   │
│   ├── brand-guide/
│   │   ├── index.ts
│   │   ├── ColorPalette.tsx
│   │   ├── ColorPalette.module.css
│   │   ├── Typography.tsx
│   │   ├── Logo.tsx
│   │   └── Guidelines.tsx
│   │
│   ├── pro-sites/                  # Flexible content sections
│   │   ├── index.ts
│   │   ├── Column.tsx
│   │   ├── TwoColumn.tsx
│   │   ├── Grid.tsx
│   │   ├── ProSites.module.css
│   │   └── _lib/                   # Internal components (NOT auto-discovered)
│   │       ├── WrapperOpen.tsx
│   │       ├── WrapperClose.tsx
│   │       ├── Header.tsx
│   │       ├── Footer.tsx
│   │       └── content/
│   │           ├── Text.tsx
│   │           ├── Image.tsx
│   │           ├── Video.tsx
│   │           ├── Html.tsx
│   │           ├── Buttons.tsx
│   │           ├── Stack.tsx
│   │           ├── Card.tsx
│   │           └── Row.tsx
│   │
│   └── global-panels/
│       └── FooterAd.tsx
│
├── pages/                          # Page templates
│   └── [client]/
│       ├── config.ts               # Client configuration
│       ├── BrandGuide.tsx
│       └── ProjectOverview.tsx
│
└── clients/                        # Client-specific overrides
    └── [client-code]/
        └── partials/
            └── CtaBranded.tsx      # Override global CTA
```

---

## 4. Implementing the Partial Registry

### `src/partials/index.ts`

```typescript
import React, { ComponentType, lazy, Suspense } from 'react';

// Type definitions
export interface PartialConfig {
  [key: string]: unknown;
}

interface RegisteredPartial {
  component: ComponentType<PartialConfig>;
  scope: 'global' | string; // string = client code
  folder: string;
}

// Registry storage
const partials = new Map<string, RegisteredPartial>();
const configWrappers = new Map<string, string>();

/**
 * Auto-discover partials using Vite's glob import
 * This runs at build time, similar to PHP's RecursiveIteratorIterator
 */
const partialModules = import.meta.glob<{ default: ComponentType<any> }>(
  [
    './**/[A-Z]*.tsx',           // All PascalCase .tsx files
    '!./**/_lib/**',             // Exclude _lib folders
    '!./index.ts',
    '!./types.ts',
  ],
  { eager: false }
);

// Process discovered modules
for (const [path, importFn] of Object.entries(partialModules)) {
  // path example: './brand-guide/ColorPalette.tsx'
  const match = path.match(/^\.\/(.+)\/([A-Z][^/]+)\.tsx$/);
  if (!match) continue;

  const [, folder, fileName] = match;
  const kebabName = fileName.replace(/([a-z])([A-Z])/g, '$1-$2').toLowerCase();

  // Register with both namespaced and short names
  const namespacedName = `${folder}/${kebabName}`;
  const LazyComponent = lazy(importFn);

  const registration: RegisteredPartial = {
    component: LazyComponent,
    scope: 'global',
    folder,
  };

  partials.set(namespacedName, registration);
  partials.set(kebabName, registration); // Short name for backward compat
}

/**
 * Register config wrapper mapping
 * Maps partial names to their expected config prop key
 */
export function registerWrapper(partialName: string, wrapperKey: string): void {
  configWrappers.set(partialName, wrapperKey);
}

// Default wrapper mappings (mirror PHP system)
registerWrapper('hero', 'heroConfig');
registerWrapper('page-header', 'pageHeaderConfig');
registerWrapper('color-palette', 'colorConfig');
registerWrapper('cta', 'ctaConfig');
registerWrapper('column', 'sectionConfig');
registerWrapper('grid', 'sectionConfig');
registerWrapper('two-column', 'sectionConfig');

/**
 * Get a registered partial
 */
export function getPartial(name: string, folder?: string): RegisteredPartial | undefined {
  const fullName = folder && !name.includes('/') ? `${folder}/${name}` : name;
  return partials.get(fullName) || partials.get(name);
}

/**
 * Check if a partial exists
 */
export function hasPartial(name: string): boolean {
  return partials.has(name);
}

/**
 * Get all registered partials (for debugging)
 */
export function getRegisteredPartials(): Map<string, RegisteredPartial> {
  return new Map(partials);
}

/**
 * Main Partial component - the React equivalent of partial() helper
 */
interface PartialProps {
  name: string;
  config?: PartialConfig;
  folder?: string;
  fallback?: React.ReactNode;
}

export function Partial({
  name,
  config = {},
  folder,
  fallback = <div className="partial-loading" />
}: PartialProps): JSX.Element | null {
  const registered = getPartial(name, folder);

  if (!registered) {
    if (import.meta.env.DEV) {
      console.warn(`[Partial Registry] Partial not found: ${name}`);
    }
    return null;
  }

  const Component = registered.component;

  // Auto-wrap config in expected key (mirrors PHP behavior)
  const wrapperKey = configWrappers.get(name);
  const wrappedConfig = wrapperKey ? { [wrapperKey]: config } : config;

  return (
    <Suspense fallback={fallback}>
      <Component {...wrappedConfig} />
    </Suspense>
  );
}

// Export helper function for those who prefer function syntax
export function partial(
  name: string,
  config: PartialConfig = {},
  folder?: string
): JSX.Element | null {
  return <Partial name={name} config={config} folder={folder} />;
}
```

---

## 5. Creating Partials

### Example: Hero Partial

#### `src/partials/top-section/Hero.tsx`

```tsx
import React from 'react';
import styles from './Hero.module.css';
import clsx from 'clsx';

/**
 * Hero Section Component
 *
 * Usage:
 * <Partial
 *   name="hero"
 *   config={{
 *     preHtml: '<div>...</div>',     // optional
 *     logo: '/path/to/logo.svg',     // optional
 *     logoAlt: 'Company Logo',       // optional
 *     badge: 'Brand Guidelines',     // optional
 *     title: 'COMPANY NAME',         // required
 *     subtitle: 'Tagline Here',      // optional
 *     postHtml: '<div>...</div>',    // optional
 *     modifiers: '',                 // optional BEM modifiers
 *   }}
 *   folder="top-section"
 * />
 */

interface HeroConfig {
  preHtml?: string;
  logo?: string;
  logoAlt?: string;
  badge?: string;
  title: string;
  subtitle?: string;
  postHtml?: string;
  modifiers?: string;
}

interface HeroProps {
  heroConfig?: HeroConfig;
  // Also accept flat props for flexibility
  preHtml?: string;
  logo?: string;
  logoAlt?: string;
  badge?: string;
  title?: string;
  subtitle?: string;
  postHtml?: string;
  modifiers?: string;
}

export default function Hero(props: HeroProps): JSX.Element {
  // Extract from wrapper if present (mirrors PHP pattern)
  const config = props.heroConfig ?? props;

  // Set defaults
  const {
    preHtml,
    logo = '',
    logoAlt = 'Logo',
    badge,
    title = 'Welcome',
    subtitle,
    postHtml,
    modifiers = '',
  } = config;

  // Build BEM classes
  const heroClass = clsx(
    styles.hero,
    'lcms-hero',
    modifiers && modifiers.split(' ').map(m => `lcms-hero--${m}`)
  );

  return (
    <section className={heroClass}>
      {preHtml && (
        <div dangerouslySetInnerHTML={{ __html: preHtml }} />
      )}

      {logo && (
        <img
          src={logo}
          alt={logoAlt}
          className={clsx(styles.hero__logo, 'lcms-hero__logo')}
        />
      )}

      {badge && (
        <span className={clsx(styles.hero__badge, 'lcms-hero__badge')}>
          {badge}
        </span>
      )}

      <h1 className={clsx(styles.hero__title, 'lcms-hero__title')}>
        {title}
      </h1>

      {subtitle && (
        <p className={clsx(styles.hero__subtitle, 'lcms-hero__subtitle')}>
          {subtitle}
        </p>
      )}

      {postHtml && (
        <div dangerouslySetInnerHTML={{ __html: postHtml }} />
      )}
    </section>
  );
}
```

#### `src/partials/top-section/Hero.module.css`

```css
/* BEM naming convention */
.hero {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: var(--spacing-xl, 80px) var(--spacing-md, 24px);
  text-align: center;
}

.hero__logo {
  max-width: 200px;
  margin-bottom: var(--spacing-md, 24px);
}

.hero__badge {
  display: inline-block;
  padding: var(--spacing-xs, 8px) var(--spacing-sm, 16px);
  background: var(--color-primary, #08093E);
  color: var(--color-white, #fff);
  font-size: var(--font-size-sm, 14px);
  border-radius: var(--radius-sm, 4px);
  margin-bottom: var(--spacing-sm, 16px);
}

.hero__title {
  font-size: var(--font-size-4xl, 48px);
  font-weight: var(--font-weight-bold, 700);
  margin: 0 0 var(--spacing-sm, 16px);
  color: var(--color-text-primary, #1a1a1a);
}

.hero__subtitle {
  font-size: var(--font-size-xl, 20px);
  color: var(--color-text-secondary, #666);
  margin: 0;
  max-width: 600px;
}

/* Modifier examples */
:global(.lcms-hero--dark) {
  background: var(--color-dark, #1a1a1a);
  color: var(--color-white, #fff);
}

:global(.lcms-hero--compact) {
  padding: var(--spacing-lg, 48px) var(--spacing-md, 24px);
}
```

---

## 6. Using Partials in Pages

### Example Page Template

#### `src/pages/project-overview/ProjectOverview.tsx`

```tsx
import React from 'react';
import { Partial } from '@/partials';
import { useClientResources } from '@/hooks/useClientResources';

interface ProjectOverviewProps {
  clientCode: string;
}

export default function ProjectOverview({ clientCode }: ProjectOverviewProps) {
  // Load client-specific resources (fonts, CSS variables)
  useClientResources(clientCode);

  return (
    <main>
      {/* Hero Section */}
      <Partial
        name="page-header"
        config={{
          preHtml: '<div class="status-wrapper"><span class="status-badge">Early Stage</span></div>',
          title: 'Break Move',
          subtitle: 'AI-Driven Breakin Project',
        }}
        folder="top-section"
      />

      {/* Project Summary */}
      <Partial
        name="column"
        config={{
          settings: {
            customClasses: 'inner-card summary-card mt--50',
          },
          content: {
            type: 'row',
            items: [
              {
                type: 'html',
                content: {
                  html: '<div class="project-info">...</div>'
                }
              },
              {
                type: 'text',
                text: 'Project description...',
                format: 'lead'
              },
            ],
          },
        }}
        folder="pro-sites"
      />

      {/* CTA Section */}
      <Partial
        name="cta"
        config={{
          title: 'Questions?',
          buttonText: 'Get in Touch',
          buttonUrl: '#contact',
        }}
        folder="bottom-section"
      />
    </main>
  );
}
```

---

## 7. Client-Specific Overrides

### Override Registration

```typescript
// src/clients/index.ts
import { ComponentType } from 'react';

const clientPartials = new Map<string, Map<string, ComponentType<any>>>();

/**
 * Register client-specific partial override
 */
export function registerClientPartial(
  clientCode: string,
  partialName: string,
  component: ComponentType<any>
): void {
  if (!clientPartials.has(clientCode)) {
    clientPartials.set(clientCode, new Map());
  }
  clientPartials.get(clientCode)!.set(partialName, component);
}

/**
 * Get client-specific partial or fall back to global
 */
export function getClientPartial(
  clientCode: string,
  partialName: string
): ComponentType<any> | undefined {
  return clientPartials.get(clientCode)?.get(partialName);
}

// Auto-discover client partials
const clientModules = import.meta.glob<{ default: ComponentType<any> }>(
  './*/partials/**/*.tsx',
  { eager: true }
);

for (const [path, module] of Object.entries(clientModules)) {
  // path: './refr/partials/CtaBranded.tsx'
  const match = path.match(/^\.\/([^/]+)\/partials\/(.+)\.tsx$/);
  if (!match) continue;

  const [, clientCode, fileName] = match;
  const partialName = fileName.replace(/([a-z])([A-Z])/g, '$1-$2').toLowerCase();

  registerClientPartial(clientCode, partialName, module.default);
}
```

### Using Client Context

```tsx
// src/partials/index.ts - Modified Partial component

import { useClient } from '@/contexts/ClientContext';
import { getClientPartial } from '@/clients';

export function Partial({ name, config, folder, fallback }: PartialProps) {
  const { clientCode } = useClient();

  // Check for client-specific override first
  const ClientOverride = clientCode
    ? getClientPartial(clientCode, name)
    : undefined;

  if (ClientOverride) {
    const wrapperKey = configWrappers.get(name);
    const wrappedConfig = wrapperKey ? { [wrapperKey]: config } : config;
    return <ClientOverride {...wrappedConfig} />;
  }

  // Fall back to global partial
  const registered = getPartial(name, folder);
  // ... rest of implementation
}
```

---

## 8. Pro-Sites Flexible Content System

### Content Type Router

```tsx
// src/partials/pro-sites/_lib/content/ContentRouter.tsx

import React from 'react';
import Text from './Text';
import Image from './Image';
import Video from './Video';
import Html from './Html';
import Buttons from './Buttons';
import Stack from './Stack';
import Card from './Card';
import Row from './Row';

const contentTypes: Record<string, React.ComponentType<any>> = {
  text: Text,
  image: Image,
  video: Video,
  html: Html,
  buttons: Buttons,
  stack: Stack,
  card: Card,
  row: Row,
};

interface ContentRouterProps {
  content: {
    type: string;
    [key: string]: unknown;
  };
}

export default function ContentRouter({ content }: ContentRouterProps) {
  const { type, ...props } = content;
  const Component = contentTypes[type];

  if (!Component) {
    if (import.meta.env.DEV) {
      console.warn(`[ContentRouter] Unknown content type: ${type}`);
    }
    return null;
  }

  return <Component {...props} />;
}
```

### Column Partial

```tsx
// src/partials/pro-sites/Column.tsx

import React from 'react';
import WrapperOpen from './_lib/WrapperOpen';
import WrapperClose from './_lib/WrapperClose';
import Header from './_lib/Header';
import Footer from './_lib/Footer';
import ContentRouter from './_lib/content/ContentRouter';
import styles from './ProSites.module.css';

interface SectionConfig {
  settings?: {
    visibility?: boolean;
    darkMode?: boolean;
    spacingTop?: string;
    customClasses?: string;
    customCss?: string;
  };
  header?: {
    heading?: {
      label?: string;
      title?: string;
      subtitle?: string;
      align?: 'left' | 'center' | 'right';
    };
  };
  content?: {
    type: string;
    [key: string]: unknown;
  };
  footer?: {
    buttons?: Array<{
      text: string;
      url: string;
      variant?: string;
    }>;
  };
}

interface ColumnProps {
  sectionConfig?: SectionConfig;
}

export default function Column({ sectionConfig }: ColumnProps) {
  if (!sectionConfig) return null;

  const { settings, header, content, footer } = sectionConfig;

  // Respect visibility setting
  if (settings?.visibility === false) return null;

  return (
    <>
      <WrapperOpen settings={settings} />

      {header?.heading && (
        <Header heading={header.heading} />
      )}

      {content && (
        <div className={styles.columnContent}>
          <ContentRouter content={content} />
        </div>
      )}

      {footer?.buttons && (
        <Footer buttons={footer.buttons} />
      )}

      <WrapperClose />
    </>
  );
}
```

---

## 9. Database Integration (PostgreSQL)

### Schema for Storing Page Configurations

```sql
-- Partials registry (optional, for dynamic partials)
CREATE TABLE partials (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  name VARCHAR(100) NOT NULL UNIQUE,
  folder VARCHAR(100),
  scope VARCHAR(50) DEFAULT 'global',
  metadata JSONB,
  created_at TIMESTAMPTZ DEFAULT NOW(),
  updated_at TIMESTAMPTZ DEFAULT NOW()
);

-- Page templates with partial configurations
CREATE TABLE page_templates (
  id UUID PRIMARY KEY DEFAULT gen_random_uuid(),
  client_code VARCHAR(50) NOT NULL,
  slug VARCHAR(255) NOT NULL,
  title VARCHAR(255) NOT NULL,

  -- Structured content using partials
  content JSONB NOT NULL DEFAULT '[]',

  -- Metadata
  status VARCHAR(20) DEFAULT 'draft',
  created_at TIMESTAMPTZ DEFAULT NOW(),
  updated_at TIMESTAMPTZ DEFAULT NOW(),

  UNIQUE(client_code, slug)
);

-- Example content JSONB structure:
-- [
--   {
--     "partial": "hero",
--     "folder": "top-section",
--     "config": { "title": "Welcome", "subtitle": "..." }
--   },
--   {
--     "partial": "column",
--     "folder": "pro-sites",
--     "config": { "settings": {...}, "content": {...} }
--   }
-- ]
```

### Express API Endpoint

```typescript
// server/routes/pages.ts

import { Router } from 'express';
import { pool } from '../db';

const router = Router();

router.get('/api/pages/:clientCode/:slug', async (req, res) => {
  const { clientCode, slug } = req.params;

  const result = await pool.query(
    `SELECT * FROM page_templates
     WHERE client_code = $1 AND slug = $2 AND status = 'published'`,
    [clientCode, slug]
  );

  if (result.rows.length === 0) {
    return res.status(404).json({ error: 'Page not found' });
  }

  res.json(result.rows[0]);
});

export default router;
```

### React Page Renderer

```tsx
// src/components/PageRenderer.tsx

import React from 'react';
import { useQuery } from '@tanstack/react-query';
import { Partial } from '@/partials';

interface PageContent {
  partial: string;
  folder?: string;
  config: Record<string, unknown>;
}

interface PageRendererProps {
  clientCode: string;
  slug: string;
}

export default function PageRenderer({ clientCode, slug }: PageRendererProps) {
  const { data: page, isLoading, error } = useQuery({
    queryKey: ['page', clientCode, slug],
    queryFn: () =>
      fetch(`/api/pages/${clientCode}/${slug}`).then(r => r.json()),
  });

  if (isLoading) return <div>Loading...</div>;
  if (error) return <div>Error loading page</div>;
  if (!page) return <div>Page not found</div>;

  return (
    <main>
      {(page.content as PageContent[]).map((block, index) => (
        <Partial
          key={`${block.partial}-${index}`}
          name={block.partial}
          config={block.config}
          folder={block.folder}
        />
      ))}
    </main>
  );
}
```

---

## 10. CSS & Asset Loading Strategy

### Design System Setup

```css
/* src/styles/design-system.css */

:root {
  /* Spacing */
  --spacing-xs: 8px;
  --spacing-sm: 16px;
  --spacing-md: 24px;
  --spacing-lg: 48px;
  --spacing-xl: 80px;

  /* Typography */
  --font-family-base: 'Inter', system-ui, sans-serif;
  --font-size-sm: 14px;
  --font-size-base: 16px;
  --font-size-lg: 18px;
  --font-size-xl: 20px;
  --font-size-2xl: 24px;
  --font-size-3xl: 32px;
  --font-size-4xl: 48px;

  /* Colors (overridden per client) */
  --color-primary: #08093E;
  --color-secondary: #3366FF;
  --color-text-primary: #1a1a1a;
  --color-text-secondary: #666666;
  --color-background: #ffffff;
  --color-dark: #1a1a1a;
  --color-white: #ffffff;

  /* Border Radius */
  --radius-sm: 4px;
  --radius-md: 8px;
  --radius-lg: 16px;
}
```

### Client Resource Loading Hook

```tsx
// src/hooks/useClientResources.ts

import { useEffect } from 'react';

interface ClientConfig {
  fonts?: string[];
  cssVariables?: Record<string, string>;
  stylesheets?: string[];
}

const clientConfigs: Record<string, ClientConfig> = {
  '4dli': {
    fonts: ['Poppins:400,600,700'],
    cssVariables: {
      '--color-primary': '#08093E',
      '--color-secondary': '#FFD700',
      '--font-family-base': "'Poppins', sans-serif",
    },
  },
  'refr': {
    fonts: ['Open Sans:400,600'],
    cssVariables: {
      '--color-primary': '#2E5090',
      '--color-secondary': '#FF6B35',
    },
  },
};

export function useClientResources(clientCode: string): void {
  useEffect(() => {
    const config = clientConfigs[clientCode];
    if (!config) return;

    // Load Google Fonts
    if (config.fonts?.length) {
      const link = document.createElement('link');
      link.rel = 'stylesheet';
      link.href = `https://fonts.googleapis.com/css2?${config.fonts.map(f => `family=${f.replace(' ', '+')}`).join('&')}&display=swap`;
      document.head.appendChild(link);
    }

    // Apply CSS variables
    if (config.cssVariables) {
      const style = document.createElement('style');
      style.id = `client-${clientCode}-variables`;
      style.textContent = `:root { ${
        Object.entries(config.cssVariables)
          .map(([key, value]) => `${key}: ${value};`)
          .join(' ')
      } }`;
      document.head.appendChild(style);
    }

    // Cleanup
    return () => {
      document.getElementById(`client-${clientCode}-variables`)?.remove();
    };
  }, [clientCode]);
}
```

---

## 11. Naming Conventions Summary

| Element              | Convention              | Example                              |
|----------------------|-------------------------|--------------------------------------|
| Partial files        | PascalCase              | `ColorPalette.tsx`                   |
| Partial name (usage) | kebab-case              | `color-palette`                      |
| Folders              | kebab-case              | `brand-guide/`, `top-section/`       |
| CSS classes (BEM)    | `.lcms-{block}__elem`   | `.lcms-hero__title`                  |
| CSS Modules          | camelCase               | `styles.heroTitle`                   |
| Config keys          | camelCase               | `heroConfig`, `sectionConfig`        |
| Props/variables      | camelCase               | `darkMode`, `spacingTop`             |

---

## 12. Quick Start Checklist

1. [ ] Create `src/partials/` directory structure
2. [ ] Implement `src/partials/index.ts` with registry and `<Partial>` component
3. [ ] Set up Vite glob imports for auto-discovery
4. [ ] Create base design system CSS with variables
5. [ ] Implement first partial (e.g., Hero) as template
6. [ ] Create `useClientResources` hook for multi-tenant support
7. [ ] Set up PostgreSQL schema for page content
8. [ ] Create Express API endpoints for page data
9. [ ] Implement `PageRenderer` component
10. [ ] Add client-specific override system

---

## 13. Key Differences from PHP Implementation

| Aspect                  | PHP (LeanCMS)                    | React (New Project)              |
|-------------------------|----------------------------------|----------------------------------|
| Discovery               | Runtime `RecursiveIterator`      | Build-time `import.meta.glob`    |
| Rendering               | `include` + `extract()`          | React components + props         |
| CSS loading             | Dynamic `<link>` tags            | CSS Modules (bundled)            |
| Config wrapping         | `extract($config_key)`           | Props destructuring              |
| Lazy loading            | Not applicable                   | `React.lazy()` + Suspense        |
| Type safety             | PHPDoc comments                  | TypeScript interfaces            |
| Template language       | PHP in HTML                      | JSX                              |

---

## 14. Additional Resources

- **Original PHP Registry:** `/includes/content/class-partial-registry.php`
- **PHP Helpers:** `/includes/utilities/class-helpers.php`
- **Example Partials:** `/templates/pages/_partials/`
- **Client Configs:** `/templates/pages/*/config.php`

---

*Generated from LeanCMS BrandHub Client project for knowledge transfer.*
