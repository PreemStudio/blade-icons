<?php

declare(strict_types=1);

namespace BombenProdukt\BladeIcons;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use BombenProdukt\BladeIcons\Facades\IconFamilyRegistry;
use Throwable;

final class VectorFactory
{
    public function make(string $name, ?string $class = null, ?array $attributes = []): Vector
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
            $instance = IconFamilyRegistry::findStyleByName($family, $style);

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
        [$family, $remainder] = \explode(':', $name, 3);
        $segments = \explode('-', $remainder, 2);

        if (\count($segments) > 1) {
            return [$family, $segments[0], $segments[1]];
        }

        return [$family, 'default', $segments[0]];
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
