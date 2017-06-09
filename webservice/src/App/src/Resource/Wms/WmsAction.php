<?php

namespace App\Resource\Wms;

use Psr\Http\Message\ServerRequestInterface;
use App\Resource\AbstractResource;

class WmsAction extends AbstractResource
{

    public function __construct(\Interop\Container\ContainerInterface $container)
    {
        parent::__construct($container);
        $service = $container->get(\App\Service\Wms\WmsService::class);
        $this->setService($service);
    }

    public function __invoke(ServerRequestInterface $request,
                             \Psr\Http\Message\ResponseInterface $response,
                             callable $next = null)
    {
        try {
            $result = $this->getService()->findAll();
        } catch (\RuntimeException $exc) {
            $response->getBody()->write(
                json_encode(['message' => $exc->getMessage()])
            );

            return $response->withStatus($exc->getCode());
        }

        if ($result instanceof ResponseInterface) {
            return $result;
        }

        foreach ($result as $value) {
            $value->setCategories(new \Doctrine\Common\Collections\ArrayCollection());
            foreach ($value->getProductCategories() as $productCategory) {
                $value->getCategories()->add($productCategory->getIdCategory());
            }

            $value->setSizes(new \Doctrine\Common\Collections\ArrayCollection());
            foreach ($value->getProductSizes() as $productSize) {
                $value->getSizes()->add($productSize->getIdSize());
            }
        }

        $hal = $this->serialize($result);
        $response->getBody()->write($hal);
        return $response
                ->withHeader('etag', md5($hal))
                ->withHeader('cache-control', 'private')
                ->withHeader('content-type', 'application/json');
    }

    protected function getClassName(): string
    {
        return App\Model\Cms::class;
    }

    protected function getORMName(): string
    {
        return 'doctrine.entitymanager.orm_dafiti';
    }
}