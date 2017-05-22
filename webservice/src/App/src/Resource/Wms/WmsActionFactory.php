<?php

namespace App\Resource\Wms;

use Interop\Container\ContainerInterface;

class WmsActionFactory
{

    public function __invoke(ContainerInterface $container)
    {
        $container->get(\App\Service\Wms\WmsService::class);
        return new WmsAction($container);
    }
}