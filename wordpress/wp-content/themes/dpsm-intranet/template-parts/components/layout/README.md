# DPSM Layout Components

## Purpose

The layout components provide the foundational structure used throughout the DPSM Intranet design system.

These components are responsible for page composition and layout only.

They should **not** contain business logic, WordPress queries, ACF calls, or content-specific rendering.

---

## Design Principles

Layout components should be:

- Reusable
- Department agnostic
- WordPress agnostic
- Data source agnostic

All data should be passed through:

```php
$args
```

Layout components should never directly call:

```php
WP_Query
get_field()
the_field()
get_posts()
```

---

## Component Responsibilities

### container.php

Provides:

- Content width constraints
- Horizontal page padding
- Alignment boundaries

Does not provide:

- Vertical spacing
- Backgrounds
- Content styling

Example:

```php
get_template_part(
    'template-parts/components/layout/container'
);
```

---

### section.php

Provides:

- Vertical spacing
- Background styling
- Page regions

Used to define logical sections of a page.

Example:

```php
get_template_part(
    'template-parts/components/layout/section',
    null,
    [
        'spacing' => 'default',
    ]
);
```

---

### page-header.php

Provides:

- Page titles
- Page descriptions
- Optional actions

Used at the top of directories, detail pages, and landing pages.

---

### page-grid.php

Provides:

- Main content / sidebar layouts
- Two-column page structures

Examples:

- Department pages
- Project details
- Resource details

---

### content-grid.php

Provides:

- Responsive card grids
- Repeating content layouts

Examples:

- Staff Directory
- Projects Directory
- Resource Center
- News Listings

---

## Layout Hierarchy

Typical page composition:

```text
Page
└── Section
    └── Container
        └── Page Header

└── Section
    └── Container
        └── Content Grid
```

For pages with sidebars:

```text
Page
└── Section
    └── Container
        └── Page Grid
            ├── Main Content
            └── Sidebar
```

---

## Rendering Convention

Layout components are opening wrapper components.

Templates are responsible for closing markup.

Example:

```php
get_template_part(
    'template-parts/components/layout/section'
);

get_template_part(
    'template-parts/components/layout/container'
);
?>

<h1>Example</h1>

</div>
</section>
```

This convention keeps layout components lightweight and avoids output buffering.

---

## Future Development

When adding new layout components:

Ask:

> Does this control page structure?

If yes, it belongs in the layout directory.

Examples:

- department-layout
- dashboard-layout
- split-layout

If the component renders actual content, it likely belongs elsewhere:

- cards/
- navigation/
- features/
- media/
- search/
