<?php

use Zend\Expressive\Application;
use Zend\Expressive\Container;
use Zend\Expressive\Delegate;
use Zend\Expressive\Helper;
use Zend\Expressive\Middleware;

return [
    // Provides application-wide services.
    // We recommend using fully-qualified class names whenever possible as
    // service names.
    'dependencies' => [
        // Use 'aliases' to alias a service name to another service. The
        // key is the alias name, the value is the service to which it points.
        'aliases' => [
            'Zend\Expressive\Delegate\DefaultDelegate' => Delegate\NotFoundDelegate::class,
        ],
        // Use 'invokables' for constructor-less services, or services that do
        // not require arguments to the constructor. Map a service name to the
        // class name.
        'invokables' => [
            // Fully\Qualified\InterfaceName::class => Fully\Qualified\ClassName::class,
            Helper\ServerUrlHelper::class => Helper\ServerUrlHelper::class,
        ],
        // Use 'factories' for services provided by callbacks/factory classes.
        'factories' => [
            Application::class => Container\ApplicationFactory::class,
            Delegate\NotFoundDelegate::class => Container\NotFoundDelegateFactory::class,
            Helper\ServerUrlMiddleware::class => Helper\ServerUrlMiddlewareFactory::class,
            Helper\UrlHelper::class => Helper\UrlHelperFactory::class,
            Helper\UrlHelperMiddleware::class => Helper\UrlHelperMiddlewareFactory::class,
            Zend\Stratigility\Middleware\ErrorHandler::class => Container\ErrorHandlerFactory::class,
            Middleware\ErrorResponseGenerator::class => Container\ErrorResponseGeneratorFactory::class,
            Middleware\NotFoundHandler::class => Container\NotFoundHandlerFactory::class,
            'doctrine' => \App\Factory\DoctrineFactory::class,
            'doctrine.entitymanager.orm_dafiti' => \App\Factory\EntityManagerFactory::class,
            App\Action\HomePageAction::class => App\Action\HomePageFactory::class,
            App\Resource\Cms\CmsAction::class => App\Resource\Cms\CmsActionFactory::class,
            App\Resource\Stock\StockAction::class => App\Resource\Stock\StockActionFactory::class,
            App\Resource\Wms\WmsAction::class => App\Resource\Wms\WmsActionFactory::class,
            App\Resource\Catalog\CatalogAction::class => App\Resource\Catalog\CatalogActionFactory::class,
            App\Resource\Catalog\InputFilter\CatalogInputFilter::class => App\Resource\Catalog\InputFilter\CatalogInputFilterFactory::class,
            Hateoas\Hateoas::class => App\Factory\SerializerFactory::class,
            \App\Service\Wms\WmsService::class => \App\Factory\ServiceFactory::class,
            \App\Service\Cms\CmsService::class => \App\Factory\ServiceFactory::class,
            \App\Service\Stock\StockService::class => \App\Factory\ServiceFactory::class,
        ],
    ],
];
