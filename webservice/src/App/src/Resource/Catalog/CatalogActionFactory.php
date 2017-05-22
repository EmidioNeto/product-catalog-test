<?php

namespace App\Resource\Catalog;

use Interop\Container\ContainerInterface;

class CatalogActionFactory {

    public function __invoke(ContainerInterface $container) {
        return new CatalogAction($container);
    }

}
