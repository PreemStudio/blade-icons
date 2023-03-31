<?php

declare(strict_types=1);

namespace PreemStudio\BladeIcons;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

final class IconFamily
{
    public function __construct(
        public readonly string $name,
        /** @var IconFamilyStyle[] */
        public readonly array $styles,
        public readonly ?string $prefix = null,
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
