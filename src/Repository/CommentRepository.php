<?php

namespace App\Repository;

use App\Entity\Comment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CommentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Comment::class);
    }

    public function findCommentsPostedByUserFromNewest($user)
    {
        return $this->createQueryBuilder('c')
            ->where('c.author = :value')->setParameter('value', $user)
            ->orderBy('c.posting_date', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * @param $restaurant_id
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getCommentsCountForRestaurant($restaurant_id)
    {
        return $this->createQueryBuilder('c')
            ->select('count(c.id) as comments_count')
            ->join('c.restaurant', 'r')
            ->andWhere('r.id = :restaurant_id')
            ->setParameter('restaurant_id', $restaurant_id)
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * @param $restaurant_id
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getAverageRateAndCommentsCountForRestaurant($restaurant_id)
    {
        return $this->createQueryBuilder('c')
            ->select('count(c.id) as comments_count, avg(c.rate) as average_rate')
            ->join('c.restaurant', 'r')
            ->andWhere('r.id = :restaurant_id')
            ->setParameter('restaurant_id', $restaurant_id)
            ->getQuery()
            ->getSingleResult();
    }

    public function getGroupedCommentsRatesForRestaurant($restaurant_id)
    {
         $result_arr = $this->createQueryBuilder('c')
            ->select('c.rate, count(c.id) as comments_count')
            ->join('c.restaurant', 'r')
            ->andWhere('r.id = :restaurant_id')
            ->setParameter('restaurant_id', $restaurant_id)
            ->groupBy('c.rate')
            ->getQuery()
            ->getResult();

        $comments_count = $this->getCommentsCountForRestaurant($restaurant_id);
        $result_asoc_arr = [];
        foreach ($result_arr as $value) {
            $result_asoc_arr[$value['rate']] = round(100 * $value['comments_count']/$comments_count, 2);
        }
        foreach ([1,2,3,4,5] as $rate) {
            if (!array_key_exists($rate, $result_asoc_arr)) {
                $result_asoc_arr[$rate] = 0;
            }
        }
        return $result_asoc_arr;
    }
}