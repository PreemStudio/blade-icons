<?php

declare(strict_types=1);

namespace PreemStudio\BladeIcons;

use PreemStudio\Jetpack\Package\AbstractServiceProvider;

final class ServiceProvider extends AbstractServiceProvider
{
    public function packageRegistered(): void
    {
        $this->app->singleton('blade-icons.icon-family-registry', IconFamilyRegistry::class);
    }

    public function provides(): array
    {
        return [
            'blade-icons.icon-family-registry',
        ];
    }
}
