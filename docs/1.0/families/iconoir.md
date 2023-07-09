---
title: Iconoir
description: How to install and configure Iconoir for Blade Icons.
breadcrumbs: [Documentation, Families, Iconoir]
---

## Installation

::: info
This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.
:::

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require bombenprodukt/blade-icons-iconoir
```

## Usage

::: info
The prefix for all icon families in this package is `iconic`. Please refer to the [resources/svg](https://github.com/faustbrian/blade-icons-iconoir/tree/main/resources/svg) directory for a list of available styles and icons.
:::

### View Component

```blade
<x-iconic:{{ style }}-{{ icon }} />
```

### Dynamic Component

```blade
<x-dynamic-component component="iconic:{{ $style }}-{{ $icon }}" />
```
