---
title: Iconic Pro
description: How to install and configure Iconic Pro for Blade Icons.
breadcrumbs: [Documentation, Families, Iconic Pro]
---

## Installation

::: info
This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.
:::

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require bombenprodukt/blade-icons-iconic-pro
```

## Usage

::: info
The prefix for all icon families in this package is `iconic-pro`. Please refer to the [resources/svg](https://github.com/faustbrian/blade-icons-iconic-pro/tree/main/resources/svg) directory for a list of available styles and icons.
:::

### View Component

```blade
<x-iconic-pro:{{ style }}-{{ icon }} />
```

### Dynamic Component

```blade
<x-dynamic-component component="iconic-pro:{{ $style }}-{{ $icon }}" />
```
