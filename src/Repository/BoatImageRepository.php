<?php

namespace App\Repository;

use App\Entity\BoatImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BoatImage>
 *
 * @method BoatImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method BoatImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method BoatImage[]    findAll()
 * @method BoatImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoatImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BoatImage::class);
    }

//    /**
//     * @return BoatImage[] Returns an array of BoatImage objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BoatImage
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
