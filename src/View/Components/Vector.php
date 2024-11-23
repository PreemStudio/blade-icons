<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\BladeIcons\View\Components;

use BaseCodeOy\BladeIcons\Facades\VectorFactory;
use Illuminate\View\Component;

final class Vector extends Component
{
    public function render(): \Closure
    {
        return function (array $data) {
            $attributes = $data['attributes']->getIterator()->getArrayCopy();

            $class = $attributes['class'] ?? '';

            unset($attributes['class']);

            return VectorFactory::make($this->componentName, $class, $attributes)->toHtml();
        };
    }
}
