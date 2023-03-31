<?php

declare(strict_types=1);

namespace PreemStudio\Icons;

use Illuminate\Support\Collection;

final class IconFamilyRegistry
{
    protected Collection $families;

    public function __construct()
    {
        $this->families = new Collection();
    }

    public function all(): Collection
    {
        return $this->families;
    }

    public function findByPrefix(string $prefix): ?string
    {
        return $this->families->where('prefix', $prefix)->keys()->first();
    }

    public function findByName(string $family): ?IconFamily
    {
        return $this->families->where('name', $family)->first();
        // return File::get(Arr::get($this->families, "{$family}.{$style}.{$name}"));
    }

    public function findByStyle(string $family, string $style): ?IconFamilyStyle
    {
        return $this->findByName($family)->styles()->where('name', $style)->first();
    }

    public function push(IconFamily $family): void
    {
        if (empty($family->prefix())) {
            //
        }

        if ($this->findByPrefix($family->prefix())) {
            //
        }

        $this->families->push($family);
    }
}
