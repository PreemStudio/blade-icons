---
title: Font Awesome Pro
description: How to install and configure Font Awesome Pro for Blade Icons.
breadcrumbs: [Documentation, Families, Font Awesome Pro]
---

## Installation

::: info
This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.
:::

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require bombenprodukt/blade-icons-font-awesome-pro
```

## Usage

::: info
The prefix for all icon families in this package is `font-awesome`. Please refer to the [resources/svg](https://github.com/faustbrian/blade-icons-font-awesome-pro/tree/main/resources/svg) directory for a list of available styles and icons.
:::

### View Component

```blade
<x-font-awesome:{{ style }}-{{ icon }} />
```

### Dynamic Component

```blade
<x-dynamic-component component="font-awesome:{{ $style }}-{{ $icon }}" />
```
