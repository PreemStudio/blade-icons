<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\BladeIcons;

use BaseCodeOy\BladeIcons\Exceptions\IconFamilyException;
use BaseCodeOy\BladeIcons\Facades\IconFamilyRegistry;
use BaseCodeOy\BladeIcons\View\Components\Vector;
use Illuminate\Support\Facades\Blade;

final class ComponentRegistrar
{
    public function register(string $family): void
    {
        $parent = IconFamilyRegistry::findByName($family);

        if (empty($parent)) {
            throw IconFamilyException::missing($family);
        }

        foreach ($parent->styles() as $style) {
            foreach ($style->icons() as $icon) {
                Blade::component(
                    Vector::class,
                    \sprintf('%s:%s-%s', $parent->prefix(), $style->prefix(), $icon),
                );
            }
        }
    }
}
