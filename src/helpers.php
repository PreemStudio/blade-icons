<?php

declare(strict_types=1);

namespace BombenProdukt\BladeIcons;

use BombenProdukt\BladeIcons\Facades\VectorFactory;

if (!\function_exists('svg')) {
    function svg(string $name, $class = '', array $attributes = []): Vector
    {
        return VectorFactory::make($name, $class, $attributes);
    }
}
