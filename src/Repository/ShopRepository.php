<?php

namespace App\Repository;

use App\Entity\Shop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Shop>
 *
 * @method Shop|null find($id, $lockMode = null, $lockVersion = null)
 * @method Shop|null findOneBy(array $criteria, array $orderBy = null)
 * @method Shop[]    findAll()
 * @method Shop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShopRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Shop::class);
    }

    public function add(Shop $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Shop $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

   /**
    * @return Shop[] Returns an array of Shop objects
    */
   public function findByOrderStatut($value): array
   {
       return $this->createQueryBuilder('s')
           ->andWhere('s.order_status = :val')
           ->setParameter('val', $value)
           ->orderBy('s.id', 'ASC')
           ->getQuery()
           ->getResult()
       ;
   }

    // public function findByUser($value): ?Shop
    // {
    //     return $this->createQueryBuilder('s')
    //         ->andWhere('s.user_id = :val')
    //         ->setParameter('val', $value)
    //         ->getQuery()
    //         ->getOneOrNullResult()
    //     ;
    // }

   public function findOneByDate($value): ?Shop
   {
       return $this->createQueryBuilder('s')
           ->andWhere('s.shipping_date = :val')
           ->setParameter('val', $value)
           ->getQuery()
           ->getOneOrNullResult()
       ;
   }

   public function findByPrice($value): ?Shop
   {
       return $this->createQueryBuilder('s')
           ->andWhere('s.price_order = :val')
           ->setParameter('val', $value)
           ->getQuery()
           ->getOneOrNullResult()
       ;
   }
}
