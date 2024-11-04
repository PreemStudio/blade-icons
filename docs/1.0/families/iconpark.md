---
title: Iconpark
description: How to install and configure Iconpark for Blade Icons.
breadcrumbs: [Documentation, Families, Iconpark]
---

## Installation

::: info
This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.
:::

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require basecodeoy/blade-icons-iconpark
```

## Usage

::: info
The prefix for all icon families in this package is `iconoir`. Please refer to the [resources/svg](https://github.com/basecodeoy/blade-icons-iconpark/tree/main/resources/svg) directory for a list of available styles and icons.
:::

### View Component

```blade
<x-iconoir:{{ style }}-{{ icon }} />
```

### Dynamic Component

```blade
<x-dynamic-component component="iconoir:{{ $style }}-{{ $icon }}" />
```
