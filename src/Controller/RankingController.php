<?php

namespace App\Controller;

use App\Entity\Restaurant;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class RankingController extends Controller
{
    /**
     * @Route("/ranking", name="ranking")
     */
    public function index()
    {
        $top_restaurants = $this->getDoctrine()->getManager()
            ->getRepository(Restaurant::class)
            ->getTopRestaurants();

        return $this->render('Ranking/ranking.html.twig', [ 'top_restaurants' => $top_restaurants ]);
    }
}
