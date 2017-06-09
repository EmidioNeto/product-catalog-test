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

    function findBySkuOrCategory($sku, $category): array
    {
        return $this->getEntityManager()->getRepository($this->getClassName())->findBySkuOrCategory($sku,
                $category);
    }

    function getEntityManager(): \Doctrine\ORM\EntityManagerInterface
    {
        return $this->entityManager;
    }

    function setEntityManager(\Doctrine\ORM\EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getClassName(): string
    {
        return \App\Model\Cms::class;
    }

    public function getORMName(): string
    {
        return 'doctrine.entitymanager.orm_dafiti';
    }
}