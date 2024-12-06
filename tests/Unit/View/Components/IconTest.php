<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

use BaseCodeOy\BladeIcons\Facades\IconFamilyRegistry;
use BaseCodeOy\BladeIcons\IconFamily;
use BaseCodeOy\BladeIcons\IconFamilyStyle;
use BaseCodeOy\BladeIcons\View\Components\Icon;
use Illuminate\View\ComponentAttributeBag;

beforeEach(function (): void {
    IconFamilyRegistry::push(
        new IconFamily('font-awesome', [
            new IconFamilyStyle('brands', __DIR__.'/../../../../icons/font-awesome/brands'),
            new IconFamilyStyle('regular', __DIR__.'/../../../../icons/font-awesome/regular'),
            new IconFamilyStyle('solid', __DIR__.'/../../../../icons/font-awesome/solid'),
        ]),
    );
});

it('creates an icon component with a given name', function (): void {
    $iconComponent = new Icon('font-awesome:brands-apple');

    expect($iconComponent->name)->toBe('font-awesome:brands-apple');
});

it('renders the icon with default attributes', function (): void {
    $iconComponent = new Icon('font-awesome:brands-apple');
    $html = $iconComponent->render()->__invoke([
        'attributes' => new ComponentAttributeBag([]),
    ]);

    expect($html)->toBe('<svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. --><path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"/></svg>');
});

it('renders the icon with custom attributes and class', function (): void {
    $iconComponent = new Icon('font-awesome:brands-apple');
    $html = $iconComponent->render()->__invoke([
        'attributes' => new ComponentAttributeBag([
            'class' => 'custom-class',
            'width' => 48,
            'height' => 48,
        ]),
    ]);

    expect($html)->toBe('<svg width="48" height="48" class="custom-class" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. --><path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"/></svg>');
});
