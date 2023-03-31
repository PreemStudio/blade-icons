<?php

declare(strict_types=1);

namespace PreemStudio\BladeIcons;

use Illuminate\Support\Collection;
use PreemStudio\BladeIcons\Exceptions\IconFamilyException;

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

    public function findByName(string $family): ?IconFamily
    {
        return $this->families->where('name', $family)->first();
    }

    public function findByPrefix(string $prefix): ?IconFamily
    {
        return $this->families->where('prefix', $prefix)->first();
    }

    public function findStyleByName(string $family, string $style): ?IconFamilyStyle
    {
        return $this->findByName($family)->styles()->where('name', $style)->first();
    }

    public function push(IconFamily $family): void
    {
        if ($collidingFamily = $this->findByPrefix($family->prefix())) {
            throw IconFamilyException::duplicate($family->name, $collidingFamily->name);
        }

        $this->families->push($family);
    }
}
