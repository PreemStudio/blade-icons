<?php

declare(strict_types=1);

namespace BombenProdukt\BladeIcons\Facades;

use BombenProdukt\BladeIcons\Vector;
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
