<?php

namespace App\Resource\Wms\Factory;

use Interop\Container\ContainerInterface;

class WmsActionFactory
{

    public function __invoke(ContainerInterface $container): \App\Resource\Wms\WmsAction
    {
        $container->get(\App\Service\Wms\WmsService::class);
        return new \App\Resource\Wms\WmsAction($container);
    }
}