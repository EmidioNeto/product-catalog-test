<?php

namespace App\Factory;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\ORM\Configuration;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\Mapping\UnderscoreNamingStrategy;
use Interop\Container\ContainerInterface;

/**
 * Description of DoctrineFactory
 *
 * @author reginaldo.neto
 * @deprecated since version 1
 */
class DoctrineFactory
{

    /**
     * @param ContainerInterface $container
     */
    public function __invoke(ContainerInterface $container)
    {
        $config = $container->has('config') ? $container->get('config') : [];
        $proxyDir = (isset($config['doctrine']['configuration']['proxy_dir'])) ?
                $config['doctrine']['configuration']['proxy_dir'] : 'data/cache/DoctrineORM/Proxy';
        $proxyNamespace = (isset($config['doctrine']['configuration']['proxy_namespace'])) ?
                $config['doctrine']['configuration']['proxy_namespace'] : 'DoctrineORMModule\Proxy';
        $autoGenerateProxyClasses = (isset($config['doctrine']['configuration']['auto_generate_proxy_classes'])) ?
                $config['doctrine']['configuration']['auto_generate_proxy_classes'] : false;
        $underscoreNamingStrategy = (isset($config['doctrine']['configuration']['underscore_naming_strategy'])) ?
                $config['doctrine']['configuration']['underscore_naming_strategy'] : false;

        // Doctrine ORM
        $doctrine = new Configuration();
        $doctrine->setProxyDir($proxyDir);
        $doctrine->setProxyNamespace($proxyNamespace);
        $doctrine->setAutoGenerateProxyClasses($autoGenerateProxyClasses);
        if ($underscoreNamingStrategy) {
            $doctrine->setNamingStrategy(new UnderscoreNamingStrategy());
        }

        // ORM mapping by Annotation
        AnnotationRegistry::registerFile('vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php');
        AnnotationRegistry::registerAutoloadNamespace("Hateoas\Configuration\Annotation", "vendor/willdurand/hateoas/src");
        AnnotationRegistry::registerAutoloadNamespace("JMS\Serializer\Annotation", "vendor/jms/serializer/src");
        AnnotationRegistry::registerAutoloadNamespace("Sec\ORM\Mapping", "src");
        $doctrine->addCustomNumericFunction('MONTH', 'Sec\DBAL\FunctionNode\Oracle\Month');
        $driver = new AnnotationDriver(
                new AnnotationReader(), ['src/Domain']
        );
        $doctrine->setMetadataDriverImpl($driver);

        return $doctrine;
    }

}
