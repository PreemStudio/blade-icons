<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\BladeIcons\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void register(string $family)
 */
final class ComponentRegistrar extends Facade
{
    #[\Override()]
    protected static function getFacadeAccessor(): string
    {
        return 'blade-icons.component-registrar';
    }
}
