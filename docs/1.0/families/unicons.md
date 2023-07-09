---
title: Unicons
description: How to install and configure Unicons for Blade Icons.
breadcrumbs: [Documentation, Families, Unicons]
---

## Installation

::: info
This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.
:::

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require bombenprodukt/blade-icons-unicons
```

## Usage

::: info
The prefix for all icon families in this package is `unicons`. Please refer to the [resources/svg](https://github.com/faustbrian/blade-icons-unicons/tree/main/resources/svg) directory for a list of available styles and icons.
:::

### View Component

```blade
<x-unicons:{{ style }}-{{ icon }} />
```

### Dynamic Component

```blade
<x-dynamic-component component="unicons:{{ $style }}-{{ $icon }}" />
```
