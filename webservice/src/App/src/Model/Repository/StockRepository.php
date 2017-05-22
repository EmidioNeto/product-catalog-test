<?php

namespace App\Model\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Description of StockRepository
 *
 * @author reginaldo.neto
 */
class StockRepository extends EntityRepository {

    public function findBySkuAndSize($sku, $size) {
        $qb = $this->getEntityManager()->createQueryBuilder()
                ->select('partial m.{id,quantity,idProductSize}, partial w.{id,name}')
                ->from($this->getClassName(), 'm')
                ->join('m.idProductSize', 'ps')
                ->join('ps.idSize', 's')
                ->join('ps.idProduct', 'p')
                ->join('m.idWarehouse', 'w')
                ->where('p.sku like :sku ')
                ->andWhere(' s.name like :size ')
                ->setParameter('sku', $sku)
                ->setParameter('size', $size)
        ;
//echo $qb->getQuery()->getSQL();die;        
        
        return $qb->getQuery()
                        ->setHint(\Doctrine\ORM\Query::HINT_FORCE_PARTIAL_LOAD, 1)
                        ->getResult();
    }

}
