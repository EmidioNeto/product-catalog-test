<?php

namespace App\Resource\Cms;

use Interop\Container\ContainerInterface;

class CmsActionFactory {

    public function __invoke(ContainerInterface $container) {
        return new CmsAction($container);
    }

}
