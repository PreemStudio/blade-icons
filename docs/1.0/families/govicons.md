---
title: Govicons
description: How to install and configure Govicons for Blade Icons.
breadcrumbs: [Documentation, Families, Govicons]
---

## Installation

::: info
This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.
:::

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require bombenprodukt/blade-icons-govicons
```

## Usage

::: info
The prefix for all icon families in this package is `govicons`. Please refer to the [resources/svg](https://github.com/faustbrian/blade-icons-govicons/tree/main/resources/svg) directory for a list of available styles and icons.
:::

### View Component

```blade
<x-govicons:{{ style }}-{{ icon }} />
```

### Dynamic Component

```blade
<x-dynamic-component component="govicons:{{ $style }}-{{ $icon }}" />
```
