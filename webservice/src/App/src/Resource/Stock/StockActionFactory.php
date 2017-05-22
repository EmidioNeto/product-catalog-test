<?php

namespace App\Resource\Stock;

use Interop\Container\ContainerInterface;

class StockActionFactory
{

    public function __invoke(ContainerInterface $container)
    {     
        return new StockAction($container);
    }
}