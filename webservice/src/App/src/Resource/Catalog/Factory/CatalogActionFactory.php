<?php

namespace App\Resource\Catalog\Factory;

use Interop\Container\ContainerInterface;

class CatalogActionFactory
{

    public function __invoke(ContainerInterface $container): \App\Resource\Catalog\CatalogAction
    {
        return new \App\Resource\Catalog\CatalogAction($container);
    }
}