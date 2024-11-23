<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\BladeIcons\Exceptions;

final class IconFamilyException extends \Exception
{
    public static function missing(string $family): self
    {
        return new self("Family by name \"{$family}\" not found.");
    }

    public static function duplicate(string $family, string $collidingFamily): self
    {
        return new self("The prefix for the \"{$family}\" collides with the one from the \"{$collidingFamily}\" set.");
    }
}
