<?php

namespace App\Repository;

use App\Entity\Boat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Boat>
 *
 * @method Boat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Boat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Boat[]    findAll()
 * @method Boat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BoatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Boat::class);
    }


    // BoatRepository.php// BoatRepository.php
// BoatRepository.php
public function findByBrand(?string $brand): array
{
    $query = $this->createQueryBuilder('b')
        ->andWhere('b.brand = :brand')
        ->setParameter('brand', $brand)
        ->orderBy('b.id', 'ASC')
        ->getQuery();

    return $query->getResult();
}




//    /**
//     * @return Boat[] Returns an array of Boat objects
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

//    public function findOneBySomeField($value): ?Boat
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
