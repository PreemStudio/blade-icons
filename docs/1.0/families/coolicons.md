---
title: Coolicons
description: How to install and configure Coolicons for Blade Icons.
breadcrumbs: [Documentation, Families, Coolicons]
---

## Installation

::: info
This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.
:::

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require bombenprodukt/blade-icons-coolicons
```

## Usage

::: info
The prefix for all icon families in this package is `coolicons`. Please refer to the [resources/svg](https://github.com/faustbrian/blade-icons-coolicons/tree/main/resources/svg) directory for a list of available styles and icons.
:::

### View Component

```blade
<x-coolicons:{{ style }}-{{ icon }} />
```

### Dynamic Component

```blade
<x-dynamic-component component="coolicons:{{ $style }}-{{ $icon }}" />
```
