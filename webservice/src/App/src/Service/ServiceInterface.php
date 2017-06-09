<?php

namespace App\Service;

/**
 *
 * @author reginaldo.neto
 */
interface ServiceInterface
{

    function getORMName(): string;

    function getClassName(): string;

    function getEntityManager(): \Doctrine\ORM\EntityManagerInterface;

    function setEntityManager(\Doctrine\ORM\EntityManagerInterface $entityManager);
}