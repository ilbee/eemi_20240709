<?php

namespace App\Repository;

use App\Entity\Medal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Medal>
 */
class MedalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Medal::class);
    }

    /**
     * @return Medal[] Returns an array of Medal objects
     */
    public function findByExampleField($value): array
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
             ->orderBy('m.id', 'ASC')
             ->setMaxResults(10)
             ->getQuery()
             ->getResult()
         ;
    }

    public function findTopNationMedals(int $nbNation = 3, int $fromPosition = 0): array
    {
        return $this->createQueryBuilder('m')
            ->select('n.id as nation_id, SUM(m.point) as total')
            ->join('m.nation', 'n')
            ->groupBy('n.id')
            ->orderBy('total', 'DESC')
            ->setMaxResults($nbNation)
            ->setFirstResult($fromPosition)
            ->getQuery()
            ->getResult();
    }
}
