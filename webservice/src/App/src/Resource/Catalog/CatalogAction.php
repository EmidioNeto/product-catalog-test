<?php

namespace App\Resource\Catalog;

use Psr\Http\Message\ServerRequestInterface;
use App\Resource\AbstractResource;

class CatalogAction extends AbstractResource
{
    protected $inputFilter;

    public function __construct(\Interop\Container\ContainerInterface $container)
    {
        parent::__construct($container);
        $this->inputFilter = new \App\Validation\InputFilterValidation();
    }

    public function __invoke(ServerRequestInterface $request,
                             \Psr\Http\Message\ResponseInterface $response,
                             callable $next = null)
    {
        try {
            $postData = (string) $request->getBody();
            $result   = json_decode($postData);

            $wmsRules = new \App\Rules\WmsRules();

            $inputFilterSpecification = $wmsRules->getInputFilterSpecification();

            $inputFilterValidation = new \App\Validation\InputFilterValidation();

            if (!$inputFilterValidation->validate($result,
                    $inputFilterSpecification)) {
                $errorMessages = $inputFilterValidation->getErrorMessages();
                $message       = implode(PHP_EOL, $errorMessages);
                throw new \RuntimeException($message,
                \Fig\Http\Message\StatusCodeInterface::STATUS_BAD_REQUEST);
            }
        } catch (\RuntimeException $exc) {
            $response->getBody()->write(
                json_encode(['message' => $exc->getMessage()])
            );
            return $response->withStatus($exc->getCode());
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

    protected function getClassName(): string
    {
        return App\Model\Cms::class;
    }

    protected function getORMName(): string
    {
        return 'doctrine.entitymanager.orm_dafiti';
    }

    function getInputFilter(): \App\Validation\InputFilterValidation
    {
        return $this->inputFilter;
    }

    function setInputFilter(\App\Validation\InputFilterValidation $inputFilter)
    {
        $this->inputFilter = $inputFilter;
    }
}