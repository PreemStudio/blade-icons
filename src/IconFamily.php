<?php

declare(strict_types=1);

namespace PreemStudio\BladeIcons;

use Illuminate\Support\Collection;

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

    public function prefix(): string
    {
        return $this->prefix ?? $this->name;
    }

    public function styles(): Collection
    {
        return new Collection($this->styles);
    }
}
