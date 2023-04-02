<?php

declare(strict_types=1);

use PreemStudio\BladeIcons\Vector;

it('can create an instance of Vector', function (): void {
    $vector = new Vector('test', '<svg></svg>');

    expect($vector)->toBeInstanceOf(Vector::class);
});

it('can get the name of the vector', function (): void {
    $vector = new Vector('test', '<svg></svg>');

    expect($vector->name())->toBe('test');
});

it('can get the contents of the vector', function (): void {
    $vector = new Vector('test', '<svg></svg>');

    expect($vector->contents())->toBe('<svg></svg>');
});

it('can get the attributes of the vector', function (): void {
    $vector = new Vector('test', '<svg></svg>', ['width' => '50']);

    expect($vector->attributes())->toBeArray()->and($vector->attributes())->toHaveKey('width');
});

it('can set attributes using magic methods', function (): void {
    $vector = new Vector('test', '<svg></svg>');
    $vector->width(100);

    expect($vector->attributes())->toHaveKey('width');
});

it('can set boolean attributes using magic methods', function (): void {
    $vector = new Vector('test', '<svg></svg>');
    $vector->readOnly();

    expect($vector->attributes())->toContain('read-only');
});

it('can convert the vector to HTML', function (): void {
    $vector = new Vector('test', '<svg></svg>', ['width' => '50']);
    $html = $vector->toHtml();

    expect($html)->toBe('<svg width="50"></svg>');
});

it('can render attributes correctly', function (): void {
    $vector = new Vector('test', '<svg></svg>', ['width' => '50', 'height' => '50']);
    $vector->readOnly();

    $html = $vector->toHtml();

    expect($html)->toBe('<svg width="50" height="50" read-only></svg>');
});

it('can handle attribute values with special characters', function (): void {
    $vector = new Vector('test', '<svg></svg>', ['data-custom' => 'hello"world']);
    $html = $vector->toHtml();

    expect($html)->toBe('<svg data-custom="hello&quot;world"></svg>');
});

it('can return the HTML as base64', function (): void {
    $vector = new Vector('test', '<svg></svg>');
    $vector->readOnly();

    expect($vector->toBase64())->toBe('PHN2ZyByZWFkLW9ubHk+PC9zdmc+');
});

it('can return the HTML as base64 data', function (): void {
    $vector = new Vector('test', '<svg></svg>');
    $vector->readOnly();

    expect($vector->toBase64Data())->toBe('data:image/svg+xml;base64,PHN2ZyByZWFkLW9ubHk+PC9zdmc+');
});
