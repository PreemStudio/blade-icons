<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\BladeIcons;

use BaseCodeOy\BladeIcons\Exceptions\IconFamilyException;
use Illuminate\Support\Collection;

final readonly class IconFamilyRegistry
{
    /** @var Collection<int, IconFamily> */
    private Collection $families;

    public function __construct()
    {
        $this->families = new Collection();
    }

    /**
     * @return Collection<int, IconFamily>
     */
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

    public function push(IconFamily $iconFamily): void
    {
        if (($collidingFamily = $this->findByPrefix($iconFamily->prefix())) instanceof IconFamily) {
            throw IconFamilyException::duplicate($iconFamily->name, $collidingFamily->name);
        }

        $this->families->push($iconFamily);
    }
}
