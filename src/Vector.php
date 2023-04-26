<?php

declare(strict_types=1);

namespace BombenProdukt\BladeIcons;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Str;

final class Vector implements Htmlable
{
    public function __construct(
        private readonly string $name,
        private readonly string $contents,
        private array $attributes = [],
    ) {
        $this->attributes = \array_map('htmlspecialchars', $this->attributes);
    }

    public function __call(string $method, array $arguments): self
    {
        if (\count($arguments) === 0) {
            $this->attributes[] = Str::snake($method, '-');
        } else {
            $this->attributes[Str::snake($method, '-')] = $arguments[0];
        }

        return $this;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function contents(): string
    {
        return $this->contents;
    }

    public function attributes(): array
    {
        return $this->attributes;
    }

    public function toBase64(): string
    {
        return \base64_encode($this->toHtml());
    }

    public function toBase64Data(): string
    {
        return 'data:image/svg+xml;base64,'.$this->toBase64();
    }

    public function toHtml(): string
    {
        return \str_replace(
            '<svg',
            \sprintf('<svg%s', $this->renderAttributes()),
            $this->contents,
        );
    }

    private function renderAttributes(): string
    {
        if (\count($this->attributes) === 0) {
            return '';
        }

        return ' '.collect($this->attributes)->map(function (string $value, $attribute) {
            if (\is_int($attribute)) {
                return $value;
            }

            return \sprintf('%s="%s"', $attribute, $value);
        })->implode(' ');
    }
}
