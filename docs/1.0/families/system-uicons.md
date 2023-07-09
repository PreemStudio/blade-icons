---
title: System Uicons
description: How to install and configure System Uicons for Blade Icons.
breadcrumbs: [Documentation, Families, System Uicons]
---

## Installation

::: info
This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.
:::

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require bombenprodukt/blade-icons-system-uicons
```

## Usage

::: info
The prefix for all icon families in this package is `systemn-ui`. Please refer to the [resources/svg](https://github.com/faustbrian/blade-icons-system-uicons/tree/main/resources/svg) directory for a list of available styles and icons.
:::

### View Component

```blade
<x-systemn-ui:{{ style }}-{{ icon }} />
```

### Dynamic Component

```blade
<x-dynamic-component component="systemn-ui:{{ $style }}-{{ $icon }}" />
```
