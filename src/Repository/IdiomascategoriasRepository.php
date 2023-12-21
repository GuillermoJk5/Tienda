<?php

namespace App\Repository;

use App\Entity\Idiomascategorias;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Idiomascategorias>
 *
 * @method Idiomascategorias|null find($id, $lockMode = null, $lockVersion = null)
 * @method Idiomascategorias|null findOneBy(array $criteria, array $orderBy = null)
 * @method Idiomascategorias[]    findAll()
 * @method Idiomascategorias[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IdiomascategoriasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Idiomascategorias::class);
    }

//    /**
//     * @return Idiomascategorias[] Returns an array of Idiomascategorias objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Idiomascategorias
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
