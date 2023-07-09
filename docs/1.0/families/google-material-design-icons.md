---
title: Google Material Design Icons
description: How to install and configure Google Material Design Icons for Blade Icons.
breadcrumbs: [Documentation, Families, Google Material Design Icons]
---

## Installation

::: info
This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.
:::

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require bombenprodukt/blade-icons-google-material-design-icons
```

## Usage

::: info
The prefix for all icon families in this package is `google-material-design`. Please refer to the [resources/svg](https://github.com/faustbrian/blade-icons-google-material-design-icons/tree/main/resources/svg) directory for a list of available styles and icons.
:::

### View Component

```blade
<x-google-material-design:{{ style }}-{{ icon }} />
```

### Dynamic Component

```blade
<x-dynamic-component component="google-material-design:{{ $style }}-{{ $icon }}" />
```
