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

    function getEntityManager(): \Doctrine\ORM\EntityManagerInterface
    {
        return $this->entityManager;
    }

    function setEntityManager(\Doctrine\ORM\EntityManagerInterface$entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getClassName(): string
    {
        return "null";
    }

    public function getORMName(): string
    {
        return 'doctrine.entitymanager.orm_dafiti';
    }
}