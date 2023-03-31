<?php

declare(strict_types=1);

namespace PreemStudio\Icons;

if (!\function_exists('svg')) {
    function svg(string $name, $class = '', array $attributes = []): Vector
    {
        return app(VectorFactory::class)->make($name, $class, $attributes);
    }
}
