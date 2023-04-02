<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;
use PreemStudio\BladeIcons\Exceptions\IconFamilyException;
use PreemStudio\BladeIcons\Facades\ComponentRegistrar;
use PreemStudio\BladeIcons\Facades\IconFamilyRegistry;
use PreemStudio\BladeIcons\IconFamily;
use PreemStudio\BladeIcons\IconFamilyStyle;

beforeEach(function (): void {
    IconFamilyRegistry::push(
        new IconFamily('font-awesome', [
            new IconFamilyStyle('default', __DIR__.'/../../icons/font-awesome/brands'),
            new IconFamilyStyle('brands', __DIR__.'/../../icons/font-awesome/brands'),
            new IconFamilyStyle('regular', __DIR__.'/../../icons/font-awesome/regular'),
            new IconFamilyStyle('solid', __DIR__.'/../../icons/font-awesome/solid'),
        ]),
    );
});

it('registers components for each icon in the family', function (): void {
    expect(Blade::getClassComponentAliases())->toHaveLength(1);

    ComponentRegistrar::register('font-awesome');

    expect(Blade::getClassComponentAliases())->toHaveLength(2488);
});

it('does not register components when the family is not found', function (): void {
    ComponentRegistrar::register('non-existent-family');
})->throws(IconFamilyException::class);
