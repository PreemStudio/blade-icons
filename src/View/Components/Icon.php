<?php

declare(strict_types=1);

namespace BombenProdukt\BladeIcons\View\Components;

use BombenProdukt\BladeIcons\Facades\VectorFactory;
use Closure;
use Illuminate\View\Component;

final class Icon extends Component
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
