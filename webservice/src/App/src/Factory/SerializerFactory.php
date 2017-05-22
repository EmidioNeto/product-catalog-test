<?php

namespace App\Factory;

use Hateoas\HateoasBuilder;
use Hateoas\UrlGenerator\CallableUrlGenerator;
use Interop\Container\ContainerInterface;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializerBuilder;
use Zend\Expressive\Router\RouterInterface;

/**
 * Description of SerializerFactory
 *
 * @author thiago.ornellas
 */
class SerializerFactory
{

    /**
     * @param ContainerInterface $container
     */
    public function __invoke(ContainerInterface $container)
    {

        $config = $container->get('config');

        $jmsBuilder = SerializerBuilder::create()
                ->setCacheDir($config['cache']['filesystem']['serializer']['path'])
                ->setDebug($config['debug'])
                ->setPropertyNamingStrategy(
                new SerializedNameAnnotationStrategy(new IdenticalPropertyNamingStrategy())
        );
        
        return HateoasBuilder::create($jmsBuilder)
                        ->setUrlGenerator('autoRouteNameGenerator', new CallableUrlGenerator(function($route, array $parameters, $absolute) use ($container) {
                            /* @var $router \Zend\Expressive\Router\RouterInterface */
                            $router = $container->get(RouterInterface::class);
                            $uri = str_replace('[/]', '', $router->generateUri($route, $parameters));
                            return $uri;
                        }))
                        ->build();
    }

}
