<?php

declare(strict_types=1);

namespace PreemStudio\BladeIcons;

use Illuminate\Support\Facades\Blade;
use PreemStudio\BladeIcons\Exceptions\IconFamilyException;
use PreemStudio\BladeIcons\Facades\IconFamilyRegistry;
use PreemStudio\BladeIcons\View\Components\Icon;

final class ComponentRegistrar
{
    public function register(string $family): void
    {
        $parent = IconFamilyRegistry::findByName($family);

        if (empty($parent)) {
            throw IconFamilyException::missing($family);
        }

        /** @var IconFamilyStyle */
        foreach ($parent->styles() as $style) {
            foreach ($style->icons() as $icon) {
                Blade::component(Icon::class, $icon, $parent->prefix().':'.$style->prefix());
            }
        }
    }
}
