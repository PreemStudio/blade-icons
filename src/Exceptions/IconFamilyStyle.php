<?php

declare(strict_types=1);

namespace BaseCodeOy\BladeIcons\Exceptions;

use Exception;

final class IconFamilyStyle extends Exception
{
    public static function missing(string $family, string $style): self
    {
        return new self("Style by name \"{$style}\" from family \"{$family}\" not found.");
    }
}
