---
title: Fontisto
description: How to install and configure Fontisto for Blade Icons.
breadcrumbs: [Documentation, Families, Fontisto]
---

## Installation

::: info
This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.
:::

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require bombenprodukt/blade-icons-fontisto
```

## Usage

::: info
The prefix for all icon families in this package is `fontisto`. Please refer to the [resources/svg](https://github.com/faustbrian/blade-icons-fontisto/tree/main/resources/svg) directory for a list of available styles and icons.
:::

### View Component

```blade
<x-fontisto:{{ style }}-{{ icon }} />
```

### Dynamic Component

```blade
<x-dynamic-component component="fontisto:{{ $style }}-{{ $icon }}" />
```
