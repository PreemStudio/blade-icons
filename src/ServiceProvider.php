<?php

declare(strict_types=1);

namespace BaseCodeOy\BladeIcons;

use BaseCodeOy\PackagePowerPack\Package\AbstractServiceProvider;

final class ServiceProvider extends AbstractServiceProvider
{
    public function packageRegistered(): void
    {
        $this->app->singleton('blade-icons.component-registrar', ComponentRegistrar::class);
        $this->app->singleton('blade-icons.icon-family-registry', IconFamilyRegistry::class);
        $this->app->singleton('blade-icons.vector-factory', VectorFactory::class);
    }

    public function packageBooted(): void
    {
        /**
         * @var ComponentRegistrar $registrar
         */
        $registrar = $this->app->get('blade-icons.component-registrar');

        /**
         * @var IconFamilyRegistry $families
         */
        $families = $this->app->get('blade-icons.icon-family-registry');

        /** @var IconFamily $family */
        foreach ($families->all() as $family) {
            $registrar->register($family->prefix());
        }
    }

    public function provides(): array
    {
        return [
            'blade-icons.component-registrar',
            'blade-icons.icon-family-registry',
            'blade-icons.vector-factory',
        ];
    }
}
