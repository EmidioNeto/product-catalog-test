<?php

namespace App\Factory;

use Interop\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;

/**
 * Description of EntityManagerFactory
 *
 * @author reginaldo.neto
 */
class EntityManagerFactory
{
    /**
     *
     * @var array
     */
    private $doctrineArrayConfig;

    /**
     *
     * @var \Doctrine\ORM\Configuration
     */
    private $doctrineConfiguration;

    /**
     * @param ContainerInterface $container
     */
    public function __invoke(ContainerInterface $container, $name, $requestedName)
    {
        $this->doctrineArrayConfig = $container->get('config')['doctrine']['connection'];
        $this->doctrineConfiguration = $container->get('doctrine');
        return $this->createEntityManager($name, $requestedName);
    }

    protected function createEntityManager($name, $requestedName)
    {
        $orm = explode('.', $name);
        $ormName = array_pop($orm);        
        if (!isset($this->doctrineArrayConfig[$ormName])) {
            throw new \Exception('Este ORM não foi encontrado. Verifique o arquivo doctrine.local.php');
        }
        $em = EntityManager::create($this->doctrineArrayConfig[$ormName], $this->doctrineConfiguration);
        return $em;
    }

}
