---
title: Fluent Ui System Icons
description: How to install and configure Fluent Ui System Icons for Blade Icons.
breadcrumbs: [Documentation, Families, Fluent Ui System Icons]
---

## Installation

::: info
This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.
:::

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require bombenprodukt/blade-icons-fluent-ui-system-icons
```

## Usage

::: info
The prefix for all icon families in this package is `fluent-ui-system`. Please refer to the [resources/svg](https://github.com/faustbrian/blade-icons-fluent-ui-system-icons/tree/main/resources/svg) directory for a list of available styles and icons.
:::

### View Component

```blade
<x-fluent-ui-system:{{ style }}-{{ icon }} />
```

### Dynamic Component

```blade
<x-dynamic-component component="fluent-ui-system:{{ $style }}-{{ $icon }}" />
```
