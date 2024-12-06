<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\BladeIcons;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

final readonly class IconFamily
{
    public function __construct(
        public string $name,
        /** @var array<IconFamilyStyle> */
        public array $styles,
        public ?string $prefix = null,
    ) {
        //
    }

    public static function fromDirectory(string $name, string $directory, ?string $prefix = null): static
    {
        return new self(
            $name,
            collect(File::directories($directory))
                ->map(fn (string $path): IconFamilyStyle => new IconFamilyStyle(\basename($path), $path))
                ->toArray(),
            $prefix,
        );
    }

    public function prefix(): string
    {
        return $this->prefix ?? $this->name;
    }

    public function styles(): Collection
    {
        return new Collection($this->styles);
    }
}
