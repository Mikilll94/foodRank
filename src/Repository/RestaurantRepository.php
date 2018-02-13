<?php

namespace App\Repository;

use App\Entity\Restaurant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Bridge\Doctrine\RegistryInterface;

class RestaurantRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Restaurant::class);
    }

    /**
     * @return array
     */
    public function getAllRestaurants()
    {
        return $this->createQueryBuilder('r')
            ->select('r')
            ->orderBy('r.name')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param $restaurant_id
     * @return mixed
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function findRestaurantWithCommentsOrdered($restaurant_id)
    {
        return $this->createQueryBuilder('r')
            ->select('r, c, rep')
            ->leftJoin('r.comments', 'c')
            ->leftJoin('c.replies', 'rep')
            ->add('orderBy', 'c.posting_date DESC, rep.posting_date ASC')
            ->where('r.id = :restaurant_id')->setParameter('restaurant_id', $restaurant_id)
            ->getQuery()
            ->getSingleResult();
    }

    public function getTopRestaurants()
    {
        return $this->createQueryBuilder('r')
            ->join('r.comments', 'c')
            ->addSelect('AVG(c.rate) AS avg_rate')
            ->addSelect('COUNT(c.id) AS comments_count')
            ->groupBy('r.id')
            ->orderBy('avg_rate', 'desc')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }
}
