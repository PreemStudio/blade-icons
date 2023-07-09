---
title: Devicons
description: How to install and configure Devicons for Blade Icons.
breadcrumbs: [Documentation, Families, Devicons]
---

## Installation

::: info
This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.
:::

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require bombenprodukt/blade-icons-devicons
```

## Usage

::: info
The prefix for all icon families in this package is `devicons`. Please refer to the [resources/svg](https://github.com/faustbrian/blade-icons-devicons/tree/main/resources/svg) directory for a list of available styles and icons.
:::

### View Component

```blade
<x-devicons:{{ style }}-{{ icon }} />
```

### Dynamic Component

```blade
<x-dynamic-component component="devicons:{{ $style }}-{{ $icon }}" />
```
