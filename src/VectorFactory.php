<?php

declare(strict_types=1);

namespace PreemStudio\BladeIcons;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Blade;
use PreemStudio\BladeIcons\Facades\IconFamilyRegistry;
use PreemStudio\BladeIcons\View\Components\Icon;
use Throwable;

final class VectorFactory
{
    public function components(string $family): void
    {
        $parent = IconFamilyRegistry::findByName($family);

        /** @var IconFamilyStyle */
        foreach ($parent->styles() as $style) {
            foreach ($style->icons() as $icon) {
                Blade::component(Icon::class, $icon, $parent->prefix().'-'.$style->prefix());
            }
        }
    }

    public function svg(string $name, ?string $class = null, ?array $attributes = []): Vector
    {
        [$family, $style, $icon] = $this->splitSetAndName($name);

        return new Vector(
            $name,
            $this->contents($family, $style, $icon),
            $this->formatAttributes($class, $attributes),
        );
    }

    private function contents(string $family, string $style, string $icon): string
    {
        try {
            $instance = IconFamilyRegistry::findByStyle($family, $style);

            return \trim(\preg_replace(
                '/^(<\?xml.+?\?>)/',
                '',
                \trim(\file_get_contents(\sprintf('%s/%s.svg', \rtrim($instance->directory), \str_replace('.', '/', $icon)))),
            ));
        } catch (Throwable) {
            throw new FileNotFoundException("Icon family style [{$family}.{$style}] not found.");
        }
    }

    private function splitSetAndName(string $name): array
    {
        $segments = \explode('.', $name, 3);

        if (\count($segments) > 2) {
            return [$segments[0], $segments[1], $segments[2]];
        }

        return [$segments[0], 'default', $segments[1]];
    }

    private function formatAttributes(array|string|null $class = null, array $attributes = []): array
    {
        if (\is_string($class)) {
            $attributes['class'] ??= $class;
        }

        if (\is_array($class)) {
            $attributes = $class;

            if (!isset($attributes['class']) && $class) {
                $attributes['class'] = $class;
            }
        }

        foreach ($attributes as $key => $value) {
            if (\is_string($value)) {
                $attributes[$key] = \str_replace('"', '&quot;', $value);
            }
        }

        return $attributes;
    }
}
