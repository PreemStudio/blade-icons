---
title: Cryptocurrency Icons
description: How to install and configure Cryptocurrency Icons for Blade Icons.
breadcrumbs: [Documentation, Families, Cryptocurrency Icons]
---

## Installation

::: info
This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.
:::

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require bombenprodukt/blade-icons-cryptocurrency-icons
```

## Usage

::: info
The prefix for all icon families in this package is `cryptocurrency`. Please refer to the [resources/svg](https://github.com/faustbrian/blade-icons-cryptocurrency-icons/tree/main/resources/svg) directory for a list of available styles and icons.
:::

### View Component

```blade
<x-cryptocurrency:{{ style }}-{{ icon }} />
```

### Dynamic Component

```blade
<x-dynamic-component component="cryptocurrency:{{ $style }}-{{ $icon }}" />
```
