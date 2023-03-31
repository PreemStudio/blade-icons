<?php

declare(strict_types=1);

use Illuminate\Support\Collection;
use PreemStudio\Icons\IconFamily;
use PreemStudio\Icons\IconFamilyStyle;

it('creates an icon family with a name, styles and optional prefix', function (): void {
    $styles = [new IconFamilyStyle('style1', ''), new IconFamilyStyle('style2', '')];
    $iconFamily = new IconFamily('myFamily', $styles);

    expect($iconFamily->name)->toBe('myFamily');
    expect($iconFamily->styles)->toBeArray();
    expect($iconFamily->styles)->toHaveCount(2);
    expect($iconFamily->prefix)->toBeNull();
});

it('returns the correct prefix', function (): void {
    $styles = [new IconFamilyStyle('style1', ''), new IconFamilyStyle('style2', '')];
    $iconFamily = new IconFamily('myFamily', $styles);

    expect($iconFamily->prefix())->toBe('myFamily');

    $iconFamilyWithPrefix = new IconFamily('myFamily', $styles, 'myprefix');
    expect($iconFamilyWithPrefix->prefix())->toBe('myprefix');
});

it('returns the styles as a collection', function (): void {
    $styles = [new IconFamilyStyle('style1', ''), new IconFamilyStyle('style2', '')];
    $iconFamily = new IconFamily('myFamily', $styles);

    $stylesCollection = $iconFamily->styles();
    expect($stylesCollection)->toBeInstanceOf(Collection::class);
    expect($stylesCollection)->toHaveLength(2);
});
