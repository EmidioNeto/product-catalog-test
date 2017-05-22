<?php

namespace App\Service\Wms;

/**
 * Description of WmsService
 *
 * @author reginaldo.neto
 */
class WmsService implements \App\Service\ServiceInterface
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

    function findBySkuAndSize($sku, $size)
    {
        return $this->getEntityManager()->getRepository($this->getClassName())->findBySkuAndSize($sku,
                $size);
    }

    public function getClassName()
    {
        return \App\Model\Wms::class;
    }

    public function getORMName()
    {
        return 'doctrine.entitymanager.orm_dafiti';
    }
}