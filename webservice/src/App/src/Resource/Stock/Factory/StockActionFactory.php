<?php

namespace App\Resource\Stock\Factory;

use Interop\Container\ContainerInterface;

class StockActionFactory
{

    public function __invoke(ContainerInterface $container): \App\Resource\Stock\StockAction
    {
        return new \App\Resource\Stock\StockAction($container);
    }
}