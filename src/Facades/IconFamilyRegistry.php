<?php

declare(strict_types=1);

namespace PreemStudio\Icons\Facades;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;
use PreemStudio\Icons\IconFamily;
use PreemStudio\Icons\IconFamilyStyle;

/**
 * @method static Collection       all()
 * @method static ?IconFamily      findByName(string $family)
 * @method static ?string          findByPrefix(string $prefix)
 * @method static ?IconFamilyStyle findByStyle(string $family, string $style)
 * @method static void             push(IconFamily $family)
 */
final class IconFamilyRegistry extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'blade-icons.icon-family-registry';
    }
}
