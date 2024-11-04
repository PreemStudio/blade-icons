<?php

declare(strict_types=1);

namespace BaseCodeOy\BladeIcons;

use Illuminate\Support\Facades\File;

final class IconFamilyStyle
{
    public function __construct(
        public readonly string $name,
        public readonly string $directory,
        public readonly ?string $prefix = null,
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
