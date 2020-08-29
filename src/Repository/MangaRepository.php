<?php

namespace App\Repository;

use App\Entity\Manga;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Manga|null find($id, $lockMode = null, $lockVersion = null)
 * @method Manga|null findOneBy(array $criteria, array $orderBy = null)
 * @method Manga[]    findAll()
 * @method Manga[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MangaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Manga::class);
    }

    /**
     * @return Manga[]
     */
    public function findNotCompleted():array
    {
        return $this->findNotCompletedQuery()
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @return Manga[]
     */
    public function findCompleted():array
    {
        return $this->findCompletedQuery()
            ->getQuery()
            ->getResult()
            ;
    }

    public function findLastMangas()
    {
        return $this->findNotCompletedQuery()
            ->setMaxResults(5)
            ->getQuery()
            ->getResult()
            ;
    }

    private function findNotCompletedQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.complete = false')
            ->orderBy('m.created_at', 'ASC');
    }

    private function findCompletedQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.complete = true')
            ->orderBy('m.created_at', 'ASC');
    }

    // /**
    //  * @return Manga[] Returns an array of Manga objects
    //  */
    /*
    public function findByExampleField($value)
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
    */

    /*
    public function findOneBySomeField($value): ?Manga
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
