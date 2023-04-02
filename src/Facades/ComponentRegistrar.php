<?php

declare(strict_types=1);

namespace PreemStudio\BladeIcons\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void register(string $family)
 */
final class ComponentRegistrar extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'blade-icons.component-registrar';
    }
}
