---
title: Yr Weather
description: How to install and configure Yr Weather for Blade Icons.
breadcrumbs: [Documentation, Families, Yr Weather]
---

## Installation

::: info
This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.
:::

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require bombenprodukt/blade-icons-yr-weather
```

## Usage

::: info
The prefix for all icon families in this package is `yr-weather-symbols`. Please refer to the [resources/svg](https://github.com/faustbrian/blade-icons-yr-weather/tree/main/resources/svg) directory for a list of available styles and icons.
:::

### View Component

```blade
<x-yr-weather-symbols:{{ style }}-{{ icon }} />
```

### Dynamic Component

```blade
<x-dynamic-component component="yr-weather-symbols:{{ $style }}-{{ $icon }}" />
```
