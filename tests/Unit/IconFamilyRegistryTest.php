<?php

declare(strict_types=1);

namespace Tests\Unit\Registries;

use Illuminate\Support\Collection;
use PreemStudio\BladeIcons\IconFamily;
use PreemStudio\BladeIcons\IconFamilyRegistry;
use PreemStudio\BladeIcons\IconFamilyStyle;

beforeEach(function (): void {
    $this->registry = new IconFamilyRegistry();
});

it('should set a family and get all icons from it', function (): void {
    $this->registry->push(
        new IconFamily('font-awesome', [
            new IconFamilyStyle('brands', __DIR__.'/../../../icons/font-awesome/brands'),
            new IconFamilyStyle('regular', __DIR__.'/../../../icons/font-awesome/regular'),
            new IconFamilyStyle('solid', __DIR__.'/../../../icons/font-awesome/solid'),
        ]),
    );

    $icons = $this->registry->all();

    expect($icons)->toBeInstanceOf(Collection::class);
    expect($icons)->toHaveLength(1);
    expect($icons[0])->toHaveLength(3);
});

it('should set a family and get icons from it', function (): void {
    $this->registry->push(
        new IconFamily('font-awesome', [
            new IconFamilyStyle('brands', __DIR__.'/../../../icons/font-awesome/brands'),
            new IconFamilyStyle('regular', __DIR__.'/../../../icons/font-awesome/regular'),
            new IconFamilyStyle('solid', __DIR__.'/../../../icons/font-awesome/solid'),
        ]),
    );

    $icon = $this->registry->findByStyle('font-awesome', 'brands');

    expect($icon)->toBeInstanceOf(IconFamilyStyle::class);
});
