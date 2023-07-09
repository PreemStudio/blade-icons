---
title: Prime Icons
description: How to install and configure Prime Icons for Blade Icons.
breadcrumbs: [Documentation, Families, Prime Icons]
---

## Installation

::: info
This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.
:::

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require bombenprodukt/blade-icons-prime-icons
```

## Usage

::: info
The prefix for all icon families in this package is `prime`. Please refer to the [resources/svg](https://github.com/faustbrian/blade-icons-prime-icons/tree/main/resources/svg) directory for a list of available styles and icons.
:::

### View Component

```blade
<x-prime:{{ style }}-{{ icon }} />
```

### Dynamic Component

```blade
<x-dynamic-component component="prime:{{ $style }}-{{ $icon }}" />
```
