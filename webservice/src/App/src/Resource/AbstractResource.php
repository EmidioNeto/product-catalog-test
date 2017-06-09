<?php

namespace App\Resource;

use Zend\Expressive\Router\RouterInterface;
use Zend\Expressive\Helper\UrlHelper;
use Interop\Container\ContainerInterface;
use JMS\Serializer\SerializerInterface;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\DeserializationContext;
use Hateoas\Hateoas;

abstract class AbstractResource
{
    /**
     *
     * @var RouterInterface
     */
    private $router;

    /**
     *
     * @var \ArrayObject
     */
    private $config;

    /**
     *
     * @var SerializerInterface
     */
    private $serializer;

    /**
     *
     * @var \App\Service\ServiceInterface
     */
    private $service;

    public function __construct(ContainerInterface $container)
    {

        $this->router     = $container->get(RouterInterface::class);
        $this->config     = $container->get('config');
        $this->serializer = $container->get(Hateoas::class);
        $this->urlHelper  = $container->get(UrlHelper::class);
        $namespace        = explode('\\', $this->getClassName());
        $serviceName      = array_pop($namespace);
        $serviceClass  = sprintf('App\Service\%s\%sService', $serviceName,
            $serviceName);
        $this->service = $container->get($serviceClass);
    }

    /**
     * Serializes the given data to the specified output format.
     *
     * @param object|array|scalar $data
     * @param string $format
     * @param Context $context
     *
     * @return string
     */
    public function serialize($data, $format = 'json',
                              SerializationContext $context = null): string
    {
        if ($context === null) {
            $context = new SerializationContext();
            $context->setSerializeNull(false);
        }

        return $this->serializer->serialize($data, $format, $context);
    }

    /**
     * Deserializes the given data to the specified type.
     *
     * @param string $data
     * @param string $type
     * @param string $format
     * @param Context $context
     *
     * @return object|array|scalar
     */
    public function deserialize($data, $type, $format = 'json',
                                DeserializationContext $context = null): object
    {
        return $this->serializer->deserialize($data, $type, $format, $context);
    }

    protected function getRouter(): RouterInterface
    {
        return $this->router;
    }

    protected function getConfig(): \ArrayObject
    {
        return $this->config;
    }

    protected function getSerializer(): Hateoas
    {
        return $this->serializer;
    }

    protected function setRouter(Router $router)
    {
        $this->router = $router;
        return $this;
    }

    protected function setConfig(\ArrayObject $config)
    {
        $this->config = $config;
        return $this;
    }

    function getService(): \App\Service\ServiceInterface
    {
        return $this->service;
    }

    function setService(\App\Service\ServiceInterface $service)
    {
        $this->service = $service;
    }

    abstract protected function getORMName(): string;

    abstract protected function getClassName(): string;
}