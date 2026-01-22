# BRMO - Break Move Guy (BMG) Project Templates

## Overview

This folder contains page templates for the **Break Move Guy (BMG)** project - an AI-driven character sprite system for breakdancing animation.

## Project Information

- **Project Name**: Break Move Guy (BMG)
- **Category**: Creative Technology / Game Development
- **Status**: Early Stage Development - Seeking Funding
- **Repository**: https://github.com/piksoul/proj-breakmove
- **Last Updated**: November 11, 2025

## Templates

### `slug-project-overview.php`

The main project overview page showcasing:
- Project summary and unique value propositions
- Target market and partnership opportunities
- Progress indicators for Planning, Development, and Funding phases
- Key metrics and production efficiency targets
- Funding requirements (Phase 1: $25K-$40K, Phase 2: $60K-$100K)
- Revenue streams and competitive advantages
- Next steps roadmap (Immediate, Short-term, Long-term)

**Technical Implementation**:
- Uses pro-sites partials for consistent layout
- Custom CSS for progress bars, metrics cards, and funding displays
- Responsive design with mobile optimization
- Sections include: hero, text columns, 2-column layouts, HTML custom sections

**Key Features**:
- Visual progress tracking with percentage bars
- Milestone tracking (Completed, In Progress, Upcoming)
- Metric cards with key project statistics
- Funding phase breakdowns with deliverables
- Interactive buttons linking to GitHub repository

## Project Details

### Core Concept

BMG is a standardized system for generating consistent breakdancing character sprites using AI-driven image generation with structured prompting. The system delivers production-ready sprite assets for games, animations, and interactive media.

### Unique Features

- **36+ Breakdancing Moves**: Complete move library covering toprock, freezes, and power moves
- **Proprietary Vocabulary**: Directive Control Vocabulary for precise pose descriptions
- **3D Coordinate System**: Exact positioning with reproducible results
- **80% Time Reduction**: AI-powered workflow vs. manual illustration (3-5 min vs 15-30 min per sprite)
- **288 Total Sprites**: 8 animation frames per pose across 36 moves

### Progress Status

| Phase | Status | Progress | Timeline |
|-------|--------|----------|----------|
| **Planning** | In Progress | 75% | Complete in 2 weeks |
| **Development** | Not Started | 0% | Start Week 3-4 (8-10 weeks) |
| **Funding** | Not Funded | 0% | Seeking Investment |

### Target Markets

1. **Game Developers** - High-quality character animations for indie developers
2. **Educational Software** - Dance and movement instruction tools
3. **Mobile Gaming Studios** - Sprite-based 2D assets for mobile platforms
4. **Animation Studios** - AI-assisted production workflow exploration

### Investment Opportunity

**Phase 1: MVP Development**
- Amount: $25,000 - $40,000
- Timeline: 3 months
- Deliverables: Prompt generation system, 10 production-ready poses, sprite sheet compiler, validation tools

**Phase 2: Full Production**
- Amount: $60,000 - $100,000
- Timeline: 6 months
- Deliverables: Complete 36-pose library, web-based pose builder, game engine plugins, documentation, marketing platform

### Competitive Advantages

- ✅ First-to-market AI-driven breakdancing sprite system
- ✅ Proprietary vocabulary enabling consistent AI outputs
- ✅ Scalable architecture supporting expansion to other dance styles
- ✅ Open documentation enabling community contributions
- ✅ Lower production costs compared to traditional animation

## Design System

This template uses the LeanCMS pro-sites partial system for consistent, professional layouts:

- **Base CSS**: Global structural styles
- **CSS Variables**: Brand colors and typography from config
- **Component Styles**: Document system CSS
- **Custom Styles**: BMG-specific progress bars, metrics, funding displays

### Key Partials Used

- `page-header` - Hero section with title and subtitle
- `column` - Single column content sections
- `2-column` - Side-by-side content layouts
- `html` - Custom HTML for complex layouts (progress indicators, metrics cards)

### Custom Components

- **Progress Indicators**: Visual bars with percentage display and milestone tracking
- **Metric Cards**: Grid layout showcasing key project statistics
- **Funding Phases**: Detailed breakdown of investment requirements
- **Status Badges**: Visual indicators for project phase status

## File Naming Convention

Following the standard LeanCMS naming pattern:
```
slug-[page-type].php
```

Example:
- `slug-project-overview.php` - Main project overview page

## Customization

To customize the project overview:

1. **Update Project Data**: Modify the arrays in `slug-project-overview.php`
2. **Adjust Progress**: Change percentage values in progress bar sections
3. **Add Sections**: Use additional pro-sites partials (column, 2-column, grid)
4. **Styling**: Modify custom CSS in the `<style>` block or add to config.php

## Future Templates

Potential additions to this folder:

- `slug-technical-specs.php` - Detailed technical documentation
- `slug-demo.php` - Interactive sprite demonstration
- `slug-pricing.php` - Licensing and pricing information
- `slug-gallery.php` - Showcase of generated sprites
- `slug-documentation.php` - Developer documentation and API reference

## Notes

- All templates use WordPress standards (`get_header()`, `get_footer()`)
- Responsive design with mobile breakpoints
- Accessibility considerations in markup
- SEO-friendly semantic HTML structure
- Integration with LeanCMS plugin architecture

## Contact

For questions about BMG project:
- **Repository**: https://github.com/piksoul/proj-breakmove
- **Status**: Seeking Funding & Development Partners

---

*This README is part of the LeanCMS Brand Hub system. For general template documentation, see `/templates/pages/README.md`*
