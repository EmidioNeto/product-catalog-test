<?php

namespace App\Service\Cms;

/**
 * Description of CmsService
 *
 * @author reginaldo.neto
 */
class CmsService implements \App\Service\ServiceInterface
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

    function findBySkuAndSize($sku, $size)
    {
        return $this->getEntityManager()->getRepository($this->getClassName())->findBySkuAndSize($sku,
                $size);
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
        return \App\Model\Stock::class;
    }

    public function getORMName()
    {
        return 'doctrine.entitymanager.orm_dafiti';
    }
}