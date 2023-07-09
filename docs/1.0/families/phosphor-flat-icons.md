---
title: Phosphor Flat Icons
description: How to install and configure Phosphor Flat Icons for Blade Icons.
breadcrumbs: [Documentation, Families, Phosphor Flat Icons]
---

## Installation

::: info
This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.
:::

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require bombenprodukt/blade-icons-phosphor-flat-icons
```

## Usage

::: info
The prefix for all icon families in this package is `phosphor-flat`. Please refer to the [resources/svg](https://github.com/faustbrian/blade-icons-phosphor-flat-icons/tree/main/resources/svg) directory for a list of available styles and icons.
:::

### View Component

```blade
<x-phosphor-flat:{{ style }}-{{ icon }} />
```

### Dynamic Component

```blade
<x-dynamic-component component="phosphor-flat:{{ $style }}-{{ $icon }}" />
```
