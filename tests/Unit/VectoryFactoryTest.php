<?php

declare(strict_types=1);

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Blade;
use PreemStudio\BladeIcons\Exceptions\IconFamilyException;
use PreemStudio\BladeIcons\Facades\IconFamilyRegistry;
use PreemStudio\BladeIcons\IconFamily;
use PreemStudio\BladeIcons\IconFamilyStyle;
use PreemStudio\BladeIcons\Vector;
use PreemStudio\BladeIcons\VectorFactory;

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

it('can create an instance of VectorFactory', function (): void {
    $vectorFactory = new VectorFactory();

    expect($vectorFactory)->toBeInstanceOf(VectorFactory::class);
});

it('can make a vector', function (): void {
    $vectorFactory = new VectorFactory();
    $vector = $vectorFactory->svg('font-awesome.brands.apple');

    expect($vector)->toBeInstanceOf(Vector::class);
});

it('can make a vector falling back to the default style', function (): void {
    $vectorFactory = new VectorFactory();
    $vector = $vectorFactory->svg('font-awesome.apple');

    expect($vector)->toBeInstanceOf(Vector::class);
});

it('throws an InvalidArgumentException when icon not found', function (): void {
    $vectorFactory = new VectorFactory();

    $vectorFactory->svg('font-awesome.brands.does-not-exist');
})->throws(FileNotFoundException::class);

it('can make a vector with a custom style', function (): void {
    $vectorFactory = new VectorFactory();
    $vector = $vectorFactory->svg('font-awesome.brands.apple');

    expect($vector)->toBeInstanceOf(Vector::class);
});

it('can make a vector with attributes', function (): void {
    $vectorFactory = new VectorFactory();
    $vector = $vectorFactory->svg('font-awesome.brands.apple', null, ['width' => '50']);

    expect($vector->attributes())->toHaveKey('width');
});

it('can make a vector with a class attribute', function (): void {
    $vectorFactory = new VectorFactory();
    $vector = $vectorFactory->svg('font-awesome.brands.apple', 'icon-class');

    expect($vector->attributes())->toHaveKey('class');
});

it('can handle attribute values with special characters', function (): void {
    $vectorFactory = new VectorFactory();
    $vector = $vectorFactory->svg('font-awesome.brands.apple', null, ['data-custom' => 'hello"world']);

    expect($vector->toHtml())->toBe('<svg data-custom="hello&amp;quot;world" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. --><path d="M318.7 268.7c-.2-36.7 16.4-64.4 50-84.8-18.8-26.9-47.2-41.7-84.7-44.6-35.5-2.8-74.3 20.7-88.5 20.7-15 0-49.4-19.7-76.4-19.7C63.3 141.2 4 184.8 4 273.5q0 39.3 14.4 81.2c12.8 36.7 59 126.7 107.2 125.2 25.2-.6 43-17.9 75.8-17.9 31.8 0 48.3 17.9 76.4 17.9 48.6-.7 90.4-82.5 102.6-119.3-65.2-30.7-61.7-90-61.7-91.9zm-56.6-164.2c27.3-32.4 24.8-61.9 24-72.5-24.1 1.4-52 16.4-67.9 34.9-17.5 19.8-27.8 44.3-25.6 71.9 26.1 2 49.9-11.4 69.5-34.3z"/></svg>');
});

it('registers components for each icon in the family', function (): void {
    expect(Blade::getClassComponentAliases())->toHaveLength(1);

    (new VectorFactory())->components('font-awesome');

    expect(Blade::getClassComponentAliases())->toHaveLength(2488);
});

it('does not register components when the family is not found', function (): void {
    (new VectorFactory())->components('non-existent-family');
})->throws(IconFamilyException::class);
