<?php

namespace App\Service\Stock;

/**
 * Description of StockService
 *
 * @author reginaldo.neto
 */
class StockService implements \App\Service\ServiceInterface
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

    function setEntityManager(\Doctrine\ORM\EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    function findBySkuAndSize($sku, $size): array
    {
        return $this->getEntityManager()->getRepository($this->getClassName())->findBySkuAndSize($sku,
                $size);
    }

    public function getClassName(): string
    {
        return \App\Model\Stock::class;
    }

    public function getORMName(): string
    {
        return 'doctrine.entitymanager.orm_dafiti';
    }
}