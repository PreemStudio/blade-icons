<?php

declare(strict_types=1);

namespace BaseCodeOy\BladeIcons\View\Components;

use BaseCodeOy\BladeIcons\Facades\VectorFactory;
use Closure;
use Illuminate\View\Component;

final class Vector extends Component
{
    public function render(): Closure
    {
        return function (array $data) {
            $attributes = $data['attributes']->getIterator()->getArrayCopy();

            $class = $attributes['class'] ?? '';

            unset($attributes['class']);

            return VectorFactory::make($this->componentName, $class, $attributes)->toHtml();
        };
    }
}
