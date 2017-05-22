<?php

namespace App\Model\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Description of CmsRepository
 *
 * @author reginaldo.neto
 */
class CmsRepository extends EntityRepository {

    public function findBySkuOrCategory($sku = null, $category = null) {
        $qb = $this->getEntityManager()->createQueryBuilder()
                ->select('partial m.{id,content,region}')
                ->from($this->getClassName(), 'm')
                ->join('m.idProduct', 'p')
                ->join('p.productCategories', 'pc')
                ->join('pc.idCategory', 'c');
        if ($sku) {
            $qb->andWhere('p.sku like :sku ')
                    ->setParameter('sku', $sku);
        }
        if ($category) {
            $qb->andWhere('c.name like :category ')
                    ->setParameter('category', $category)
            ;
        }

//        echo $qb->getQuery()->getSQL();die;        

        return $qb->getQuery()
                        ->setHint(\Doctrine\ORM\Query::HINT_FORCE_PARTIAL_LOAD, 1)
                        ->getResult();
    }

}
