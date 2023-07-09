---
title: Icomoon Ultimate
description: How to install and configure Icomoon Ultimate for Blade Icons.
breadcrumbs: [Documentation, Families, Icomoon Ultimate]
---

## Installation

::: info
This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.
:::

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require bombenprodukt/blade-icons-icomoon-ultimate
```

## Usage

::: info
The prefix for all icon families in this package is `icomoon`. Please refer to the [resources/svg](https://github.com/faustbrian/blade-icons-icomoon-ultimate/tree/main/resources/svg) directory for a list of available styles and icons.
:::

### View Component

```blade
<x-icomoon:{{ style }}-{{ icon }} />
```

### Dynamic Component

```blade
<x-dynamic-component component="icomoon:{{ $style }}-{{ $icon }}" />
```
