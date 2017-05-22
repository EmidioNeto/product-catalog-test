<?php

namespace App\Resource\Wms;

use Psr\Http\Message\ServerRequestInterface;
use App\Resource\AbstractResource;

class WmsAction extends AbstractResource
{

    public function __invoke(ServerRequestInterface $request,
                             \Psr\Http\Message\ResponseInterface $response,
                             callable $next = null)
    {
        try {
        $result = [];
        } catch (\RuntimeException $exc) {
            $$response->getBody()->write(
                json_encode(['message' => $exc->getMessage()])
            );

            return $$response->withStatus($exc->getCode());
        }

        if ($result instanceof ResponseInterface) {
            return $result;
        }

        foreach ($result as $value) {
            
            $value->setCategories(new \Doctrine\Common\Collections\ArrayCollection());
            foreach ($value->getProductCategories() as $productCategory) {
                $value->getCategories()->add($productCategory->getIdCategory());
            }

            $value->setProductCategories(null);

            $value->setSizes(new \Doctrine\Common\Collections\ArrayCollection());
            foreach ($value->getProductSizes() as $productSize) {
                $value->getSizes()->add($productSize->getIdSize());
            }

            $value->setProductSizes(null);
        }

        $hal = $this->serialize($result);
        $response->getBody()->write($hal);
        return $response
                ->withHeader('etag', md5($hal))
                ->withHeader('cache-control', 'private')
                ->withHeader('content-type', 'application/json');
    }

    protected function getClassName()
    {
        return App\Model\Cms::class;
    }

    protected function getORMName()
    {
        return 'doctrine.entitymanager.orm_dafiti';
    }
}