# DPSM Card Components

## Purpose

Card components are responsible for rendering content entities throughout the DPSM Intranet.

Unlike layout components, cards render actual content and visual information.

Card components should:

- Accept data through `$args`
- Remain data source agnostic
- Never query WordPress directly
- Never call ACF functions directly
- Never use `WP_Query`

Data should be normalized before reaching the component.

Example:

```php
get_template_part(
    'template-parts/components/cards/staff-card',
    null,
    [
        'name' => $staff->name,
        'position' => $staff->position,
    ]
);
```

---

# Card Types

## Staff Card

Represents a person.

Used in:

- Staff Directory
- Department Pages
- Project Leads
- Team Listings

### Expected Data

```php
[
    'name'       => '',
    'position'   => '',
    'department' => '',
    'unit'       => '',
    'email'      => '',
    'phone'      => '',
    'photo'      => '',
    'class'      => '',
]
```

### Visual Priority

```text
Photo
Name
Position
Department
Contact Information
```

---

## Project Card

Represents a project or initiative.

Used in:

- Project Directory
- Homepage Featured Projects
- Department Project Listings

### Expected Data

```php
[
    'title'       => '',
    'summary'     => '',
    'status'      => '',
    'domain'      => '',
    'progress'    => 0,
    'lead'        => '',
    'updated_at'  => '',
    'url'         => '',
    'class'       => '',
]
```

### Visual Priority

```text
Status
Title
Summary
Progress
Lead
Updated Date
```

---

## Resource Card

Represents a document or downloadable resource.

Used in:

- Resource Center
- Department Resources
- Homepage Featured Resources

### Expected Data

```php
[
    'title'           => '',
    'description'     => '',
    'resource_type'   => '',
    'department'      => '',
    'revision_date'   => '',
    'download_url'    => '',
    'class'           => '',
]
```

### Visual Priority

```text
Resource Type
Title
Description
Department
Revision Date
Download Action
```

---

## News Card

Represents a news article or announcement.

Used in:

- News & Announcements
- Homepage Updates
- Department News

### Expected Data

```php
[
    'title'       => '',
    'excerpt'     => '',
    'date'        => '',
    'department'  => '',
    'category'    => '',
    'url'         => '',
    'image'       => '',
    'class'       => '',
]
```

### Visual Priority

```text
Category
Date
Headline
Excerpt
Department
```

---

# Shared Design Language

Cards may share:

- DaisyUI card styles
- DaisyUI badges
- DaisyUI buttons
- DaisyUI avatars
- Spacing scale
- Border radius
- Elevation system

Cards should NOT be forced into the same internal layout.

Each card type should be optimized for its content.

```text
Staff Card   = Person
Project Card = Initiative
Resource Card = Document
News Card    = Article
```

These are different content types and may require different visual structures.

---

# Design System Principle

Share primitives.

Do not force shared layouts.

Good:

```text
badge
avatar
button
card
```

Bad:

```text
one-card-layout-for-everything
```

Content determines presentation.
