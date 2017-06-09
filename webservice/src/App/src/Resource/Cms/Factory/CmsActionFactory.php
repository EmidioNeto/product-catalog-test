<?php

namespace App\Resource\Cms\Factory;

use Interop\Container\ContainerInterface;

class CmsActionFactory
{

    public function __invoke(ContainerInterface $container): \App\Resource\Cms\CmsAction
    {
        return new \App\Resource\Cms\CmsAction($container);
    }
}