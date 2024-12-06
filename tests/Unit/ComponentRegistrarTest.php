<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\BladeIcons\Exceptions\IconFamilyException;
use BaseCodeOy\BladeIcons\Facades\ComponentRegistrar;
use BaseCodeOy\BladeIcons\Facades\IconFamilyRegistry;
use BaseCodeOy\BladeIcons\IconFamily;
use BaseCodeOy\BladeIcons\IconFamilyStyle;
use Illuminate\Support\Facades\Blade;

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

    expect(Blade::getClassComponentAliases())->toHaveLength(2_488);
});

it('does not register components when the family is not found', function (): void {
    ComponentRegistrar::register('non-existent-family');
})->throws(IconFamilyException::class);
