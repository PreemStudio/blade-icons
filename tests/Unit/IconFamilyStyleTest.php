<?php

declare(strict_types=1);

use PreemStudio\BladeIcons\IconFamilyStyle;

it('creates an icon family style with a name, directory, and optional prefix', function (): void {
    $iconFamilyStyle = new IconFamilyStyle('myStyle', '');

    expect($iconFamilyStyle->name)->toBe('myStyle');
    expect($iconFamilyStyle->directory)->toBe('');
    expect($iconFamilyStyle->prefix)->toBeNull();
});

it('returns the correct prefix', function (): void {
    $iconFamilyStyle = new IconFamilyStyle('myStyle', '');

    expect($iconFamilyStyle->prefix())->toBe('myStyle');

    $iconFamilyStyleWithPrefix = new IconFamilyStyle('myStyle', '', 'myprefix');
    expect($iconFamilyStyleWithPrefix->prefix())->toBe('myprefix');
});

it('returns the correct files as an array', function (): void {
    $iconFamilyStyle = new IconFamilyStyle('myStyle', __DIR__.'/../../icons/font-awesome/brands');

    $icons = $iconFamilyStyle->files();
    expect($icons)->toBeArray();
    expect($icons)->toHaveCount(467);
    expect($icons)->toHaveKey('apple');
    expect($icons)->toHaveKey('github');
});
