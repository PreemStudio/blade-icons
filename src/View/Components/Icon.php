<?php

declare(strict_types=1);

namespace PreemStudio\BladeIcons\View\Components;

use Closure;
use Illuminate\View\Component;
use function PreemStudio\BladeIcons\svg;

final class Icon extends Component
{
    public string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function render(): Closure
    {
        return function (array $data) {
            $attributes = $data['attributes']->getIterator()->getArrayCopy();

            $class = $attributes['class'] ?? '';

            unset($attributes['class']);

            return svg($this->name, $class, $attributes)->toHtml();
        };
    }
}
