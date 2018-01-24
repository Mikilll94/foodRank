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
     * @param $restaurant_id
     * @return mixed
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function findRestaurantWithCommentsOrdered($restaurant_id)
    {
        return $this->createQueryBuilder('r')
            ->select('r, c')
            ->leftJoin('r.comments', 'c')
            ->orderBy('c.posting_date', 'DESC')
            ->where('r.id = :restaurant_id')->setParameter('restaurant_id', $restaurant_id)
            ->getQuery()
            ->getSingleResult();
    }
}
