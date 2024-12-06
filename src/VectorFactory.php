<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\BladeIcons;

use BaseCodeOy\BladeIcons\Facades\IconFamilyRegistry;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

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

            return \trim((string) \preg_replace(
                '/^(<\?xml.+?\?>)/',
                '',
                \trim(\file_get_contents(\sprintf('%s/%s.svg', \rtrim($instance->directory), \str_replace('.', '/', $icon)))),
            ));
        } catch (\Throwable) {
            throw new FileNotFoundException(\sprintf('Icon family style [%s.%s] not found.', $family, $style));
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

            if (!\array_key_exists('class', $attributes) && $class) {
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
