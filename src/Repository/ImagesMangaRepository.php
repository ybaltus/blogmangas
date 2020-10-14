<?php

namespace App\Repository;

use App\Entity\ImagesManga;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImagesManga|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImagesManga|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImagesManga[]    findAll()
 * @method ImagesManga[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImagesMangaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImagesManga::class);
    }

    // /**
    //  * @return ImagesManga[] Returns an array of ImagesManga objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImagesManga
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
