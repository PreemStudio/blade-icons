<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\BladeIcons\Exceptions;

final class IconFamilyStyle extends \Exception
{
    public static function missing(string $family, string $style): self
    {
        return new self("Style by name \"{$style}\" from family \"{$family}\" not found.");
    }
}
