---
title: Boxicons
description: How to install and configure Boxicons for Blade Icons.
breadcrumbs: [Documentation, Families, Boxicons]
---

## Installation

::: info
This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.
:::

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require bombenprodukt/blade-icons-boxicons
```

## Usage

::: info
The prefix for all icon families in this package is `boxicons`. Please refer to the [resources/svg](https://github.com/faustbrian/blade-icons-boxicons/tree/main/resources/svg) directory for a list of available styles and icons.
:::

### View Component

```blade
<x-boxicons:{{ style }}-{{ icon }} />
```

### Dynamic Component

```blade
<x-dynamic-component component="boxicons:{{ $style }}-{{ $icon }}" />
```
