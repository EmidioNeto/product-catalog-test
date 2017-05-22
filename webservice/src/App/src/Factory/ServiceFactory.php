<?php

namespace App\Factory;

use Interop\Container\ContainerInterface;

/**
 * Description of ServiceFactory
 *
 * @author reginaldo.neto
 * 
 */
class ServiceFactory implements \Zend\ServiceManager\Factory\AbstractFactoryInterface
{

    public function canCreate(ContainerInterface $container, $requestedName): bool
    {
        return is_subclass_of($requestedName,
            App\Service\ServiceInterface::class);
    }

    public function __invoke(ContainerInterface $container, $requestedName,
                            array  $options = null)
    {
        return new $requestedName($container);
    }
}