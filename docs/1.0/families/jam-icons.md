---
title: Jam Icons
description: How to install and configure Jam Icons for Blade Icons.
breadcrumbs: [Documentation, Families, Jam Icons]
---

## Installation

::: info
This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.
:::

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require bombenprodukt/blade-icons-jam-icons
```

## Usage

::: info
The prefix for all icon families in this package is `jam`. Please refer to the [resources/svg](https://github.com/faustbrian/blade-icons-jam-icons/tree/main/resources/svg) directory for a list of available styles and icons.
:::

### View Component

```blade
<x-jam:{{ style }}-{{ icon }} />
```

### Dynamic Component

```blade
<x-dynamic-component component="jam:{{ $style }}-{{ $icon }}" />
```
