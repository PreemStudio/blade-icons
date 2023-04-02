<?php

declare(strict_types=1);

namespace PreemStudio\BladeIcons\Facades;

use Illuminate\Support\Facades\Facade;
use PreemStudio\BladeIcons\Vector;

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
