<?php

namespace App\Resource\Cms;

use Psr\Http\Message\ServerRequestInterface;
use App\Resource\AbstractResource;

class CmsAction extends AbstractResource {

    public function __invoke(ServerRequestInterface $request, \Psr\Http\Message\ResponseInterface $response, callable $next = null) {
        try {
            $sku = $request->getAttribute('sku');
            $category = $request->getAttribute('category');
            $result = $this->getService()->findBySkuOrCategory($sku, $category);
        } catch (\RuntimeException $exc) {
            $$response->getBody()->write(
                    json_encode(['message' => $exc->getMessage()])
            );

            return $$response->withStatus($exc->getCode());
        }

        if ($result instanceof ResponseInterface) {
            return $result;
        }
        $hal = $this->serialize($result);
        $response->getBody()->write($hal);
        return $response
                        ->withHeader('etag', md5($hal))
                        ->withHeader('cache-control', 'private')
                        ->withHeader('content-type', 'application/json');
    }

    protected function getClassName() {
        return App\Model\Cms::class;
    }

    protected function getORMName() {
        return 'doctrine.entitymanager.orm_dafiti';
    }

}
