<?php

declare(strict_types=1);

namespace BaseCodeOy\BladeIcons\Facades;

use BaseCodeOy\BladeIcons\Vector;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Vector make(string $name, ?string $class = null, ?array $attributes = [])
 */
final class VectorFactory extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'blade-icons.vector-factory';
    }
}
