<?php

declare(strict_types=1);

namespace BaseCodeOy\BladeIcons\View\Components;

use BaseCodeOy\BladeIcons\Facades\VectorFactory;
use Closure;
use Illuminate\View\Component;

final class Icon extends Component
{
    public function __construct(public readonly string $name)
    {
        //
    }

    public function render(): Closure
    {
        return function (array $data) {
            $attributes = $data['attributes']->getIterator()->getArrayCopy();

            $class = $attributes['class'] ?? '';

            unset($attributes['class']);

            return VectorFactory::make($this->name, $class, $attributes)->toHtml();
        };
    }
}
