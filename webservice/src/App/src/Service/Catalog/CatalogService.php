<?php

namespace App\Service\Catalog;

/**
 * Description of CatalogService
 *
 * @author reginaldo.neto
 */
class CatalogService implements \App\Service\ServiceInterface
{
    /**
     *
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    public function __construct($container)
    {
        if (null !== $this->getORMName()) {
            $this->entityManager = $container->get($this->getORMName());
        }
    }

    function getEntityManager()
    {
        return $this->entityManager;
    }

    function setEntityManager($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getClassName()
    {
        return null;
    }

    public function getORMName()
    {
        return 'doctrine.entitymanager.orm_dafiti';
    }
}