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
        return new self(\sprintf('Family by name "%s" not found.', $family));
    }

    public static function duplicate(string $family, string $collidingFamily): self
    {
        return new self(\sprintf('The prefix for the "%s" collides with the one from the "%s" set.', $family, $collidingFamily));
    }
}
