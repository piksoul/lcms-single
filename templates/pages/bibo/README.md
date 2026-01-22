# BIBO - Big Boss City Project Templates

## Overview

This folder contains page templates for **Big Boss City** - a multi-format creative IP featuring urban chaos, unforgettable characters, and bold visual storytelling.

## Project Information

- **Project Name**: Big Boss City
- **Tagline**: "A world overtaken by too many big bosses"
- **Category**: Multi-Format Creative IP (Games, Comics, Merchandise)
- **Status**: Planning Phase (65% Complete) - Seeking Funding
- **Last Updated**: November 11, 2025

## Templates

### `slug-project-overview.php`

The main project overview page showcasing:
- Executive summary and unique value proposition
- Target audience (gamers, comic readers, art collectors, merchandise fans)
- Progress indicators for Planning (65%), Development (0%), Funding (0%)
- Key highlights (6 major differentiators)
- Product formats (Game, Comics, Merchandise)
- Visual identity ("Bongo Style" aesthetic guidelines)
- Competitive advantages
- Team opportunities (6 key roles)
- 4-phase project roadmap
- Call to action for investors, publishers, collaborators, and community

**Technical Implementation**:
- Uses pro-sites partials for consistent layout
- Custom CSS for Big Boss City branding (black, white, orange accent colors)
- Custom styling for progress bars, highlight cards, product cards, and roadmap phases
- Responsive design with mobile optimization
- Sections include: hero, text columns, 2-column layouts, HTML custom sections

**Key Features**:
- Bold black-and-white color scheme with orange accents
- Visual progress tracking with percentage bars
- Product format breakdowns (game, comics, merchandise)
- "Bongo Style" visual identity showcase
- Team role cards for recruitment
- Multi-phase roadmap with status badges
- Interactive CTA grid for different audiences

## Project Details

### Core Concept

Big Boss City is an original IP universe where 15 overpowered bosses battle for supremacy in a chaotic urban landscape. Their constant conflicts create inefficiency and opportunity for two skilled protagonists (Bongo and Duke) who excel at staying under the radar. Designed for multi-format storytelling across games, comics, and merchandise.

### Unique Features

- **15 Fully Designed Boss Characters**: Each with complete specifications, personality, weapons, and territory
- **"Bongo Style" Visual Aesthetic**: Pure black-and-white, thick outlines, strong silhouettes
- **Territory-Based World**: 15 distinct districts with unique aesthetics
- **Dual Protagonists**: Bongo and Duke offering complementary gameplay/narrative styles
- **Multi-Format Design**: Built for games (beat-em-up), comics (character stories), and merchandise (collectibles)

### Progress Status

| Phase | Status | Progress | Details |
|-------|--------|----------|---------|
| **Planning** | In Progress | 65% | Core concept, 15 bosses designed, art style complete |
| **Development** | Not Started | 0% | Ready for sprite production, comics, game prototype |
| **Funding** | Not Funded | 0% | Seeking $150K-$300K seed funding |

### Products & Formats

**🎮 Game**
- Format: Beat-em-up / Brawler
- Platforms: PC, Console, Mobile
- Features: Territory progression, boss rush, co-op, avoidance/stealth mechanics
- Market Position: Indie action game (comparable to Cuphead, Skullgirls, Streets of Rage 4)

**📚 Comics**
- Format: Digital and Print Series
- Structure: Character-driven episodic stories
- Features: Boss origin stories, character arcs, territory conflicts
- Market Position: Independent comic with game tie-in potential

**🛍️ Merchandise**
- Product Lines: Art prints, trading cards, apparel, accessories, collectibles
- Strategy: Character-focused with strong visual appeal
- Market Position: Indie gaming and comic community merchandise

### Visual Identity: "Bongo Style"

Core Principles:
- ✓ Pure black-and-white only (no gradients, grays, or hatching)
- ✓ Thick, even-width outlines with minimal internal detail
- ✓ Strong silhouettes readable by outline alone
- ✓ Clear negative space and limb separation
- ✓ Scalable from sprite size to poster size
- ✓ Bold, graphic, instantly recognizable

**Aesthetic**: Classic animation meets modern graphic design—early Disney meets contemporary streetwear

### Target Audience

1. **Gamers** - Beat-em-up, brawler, indie game fans
2. **Comic Readers** - Action, urban fantasy, character-driven stories
3. **Art Collectors** - Bold graphic design, character art
4. **Merchandise Enthusiasts** - Collectibles, trading cards, apparel

### Funding Needs

**Seed Funding: $150,000 - $300,000**

**Use of Funds**:
- Character sprite production (2 protagonists + 15 bosses)
- Environment and background art library
- Game prototype development
- First comic series (6-12 issues)
- Initial merchandise production run
- Marketing and community building

**Funding Opportunities**:
- Angel investors or creative funds
- Game publisher partnerships
- Crowdfunding campaign (Kickstarter)
- Comic publisher partnerships
- Licensing and merchandise deals

### Team Opportunities

Currently seeking:
- **Character Artists** - Sprite animation and illustration (Bongo Style)
- **Environment Artists** - Background and territory design
- **Game Developers** - Beat-em-up mechanics, boss encounters
- **Comic Writers & Artists** - Character storytelling, sequential art
- **Narrative Designer** - World-building, character relationships
- **Producer / Project Manager** - Cross-product coordination

### Competitive Advantages

- ✅ Complete creative foundation ready for production
- ✅ 15 boss characters provide natural expansion and collectibility
- ✅ Transmedia storytelling amplifies each product format
- ✅ Distinctive visual style cuts through market noise
- ✅ Territory-based world-building enables endless content
- ✅ Dual protagonist approach broadens audience appeal

## Design System

This template uses the LeanCMS pro-sites partial system with Big Boss City-specific customizations:

- **Base CSS**: Global structural styles
- **CSS Variables**: Custom overrides for black (#000), white (#FFF), orange (#FFA500) theme
- **Component Styles**: Document system CSS
- **Custom Styles**: BIBO-specific progress bars, highlight cards, product cards, roadmap phases

### Key Partials Used

- `column` - Single column content sections
- `2-column` - Side-by-side content layouts
- `html` - Custom HTML for complex layouts (progress indicators, highlight grids, product cards)

### Custom Components

- **BIBO Hero**: Black gradient background with orange accent border
- **Progress Indicators**: Color-coded bars (orange for planning, red for not started)
- **Highlight Cards**: Grid layout with hover effects
- **Product Cards**: Detailed product format breakdowns
- **Visual Style Box**: Black background showcasing "Bongo Style" principles
- **Team Role Cards**: Recruitment opportunity displays
- **Roadmap Phases**: Large phase numbers with status badges

## Color Scheme

**Primary Colors**:
- Black: `#000000` (primary brand)
- White: `#FFFFFF` (secondary brand)
- Orange: `#FFA500` (accent color)
- Red: `#DC143C` (warning/not funded status)

**Usage**:
- Hero backgrounds: Black gradient
- Accent elements: Orange borders, bullets, status badges
- Warning states: Red for unfunded/not started statuses
- Content: White backgrounds with black text

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
3. **Update Roadmap**: Modify phase statuses and timelines
4. **Add Sections**: Use additional pro-sites partials (column, 2-column, grid)
5. **Styling**: Modify custom CSS in the `<style>` block or adjust color variables

## Future Templates

Potential additions to this folder:

- `slug-character-gallery.php` - Showcase all 15 boss characters
- `slug-world-map.php` - Territory and district visualization
- `slug-art-style-guide.php` - Detailed "Bongo Style" documentation
- `slug-game-design.php` - Game mechanics and design document
- `slug-comic-preview.php` - Sample comic pages and scripts
- `slug-merchandise-catalog.php` - Product line showcase

## Notes

- All templates use WordPress standards (`get_header()`, `get_footer()`)
- Responsive design with mobile breakpoints
- Accessibility considerations in markup
- SEO-friendly semantic HTML structure
- Integration with LeanCMS plugin architecture
- Bold black-and-white aesthetic with orange accents throughout

## Roadmap

### Phase 1: Foundation Complete (65%)
**Timeline**: Q4 2024 - Q1 2025
- Core concept and world-building documentation ✓
- All 15 boss characters fully specified ✓
- Art style guidelines and specifications ✓
- Narrative framework and character relationships ✓

### Phase 2: Pre-Production (Planning)
**Timeline**: Q2 2025
- Complete world-building bible
- Game design document
- First comic scripts (3-6 issues)
- Merchandise design concepts
- Team assembly and production pipeline

### Phase 3: Production (Pending Funding)
**Timeline**: Q3 2025 - Q4 2025
- Character sprite production (17 full sets)
- Environment and background art library
- Game prototype and vertical slice
- First comic series production
- Initial merchandise manufacturing

### Phase 4: Launch & Marketing (Pending Funding)
**Timeline**: Q1 2026
- Game early access or full launch
- Comic series Issue #1 release
- Merchandise store opening
- Community building and social presence
- Press and influencer outreach

## Contact

- **Project Lead**: [Your Name/Studio]
- **Email**: [contact@bigbosscity.com]
- **Website**: [https://bigbosscity.com]
- **Twitter**: [@BigBossCity]
- **Instagram**: [@BigBossCity]
- **Discord**: [Community Server]

## Assets Available

**Documentation**:
- Complete character specifications (15 bosses + 2 protagonists)
- Art style guide with detailed specifications
- World-building briefs and framework
- Repository structure with organized documentation

**Visuals**:
- Character sprite specifications (32-frame breakdowns)
- Style examples and references
- Concept descriptions ready for visualization

**Ready for Pitch**:
- Investor presentations
- Publisher meetings
- Team recruitment materials
- Community announcements

---

*This README is part of the LeanCMS Brand Hub system. For general template documentation, see `/templates/pages/README.md`*
