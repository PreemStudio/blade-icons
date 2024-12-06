<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\BladeIcons;

use Illuminate\Support\Facades\File;

final readonly class IconFamilyStyle
{
    public function __construct(
        public string $name,
        public string $directory,
        public ?string $prefix = null,
    ) {
        //
    }

    public function prefix(): string
    {
        return $this->prefix ?? $this->name;
    }

    public function icons(): array
    {
        return \array_keys($this->files());
    }

    public function files(): array
    {
        $icons = [];

        foreach (File::allFiles($this->directory) as $file) {
            if ($file->getExtension() === 'svg') {
                $icons[$file->getFilenameWithoutExtension()] = $file->getPathname();
            }
        }

        return $icons;
    }
}
