<?php

declare(strict_types=1);

namespace BombenProdukt\BladeIcons\Exceptions;

use Exception;

final class IconFamilyException extends Exception
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
