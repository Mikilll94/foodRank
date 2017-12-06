<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RecipiesController extends Controller
{
    /**
    * @Route("/getRestaurants")
    */
    public function getRestaurants()
    {
        return new Response(
            '<html><body><h1>Restaurants</h1></body></html>'
        );
    }

    /**
    * @Route("/getRestaurant/restaurant")
    */
    public function getRestaurant()
    {
        $restaurant = 'Knajpka na fyrtlu';
        return $this->render('getRestaurant/restaurant.html.twig', array(
            'restaurant' => $restaurant,
        ));
    }
}