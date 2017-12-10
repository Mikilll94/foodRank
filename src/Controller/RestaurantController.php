<?php
namespace App\Controller;

use App\Entity\Restaurant;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RestaurantController extends Controller
{
    /**
    * @Route("/", name="all_restaurants")
    * @Route("restaurants")
    */
    public function Index()
    {
        $restaurants = $this->getDoctrine()
            ->getRepository(Restaurant::class)
            ->findAll();

        return $this->render('Restaurant/index.html.twig',
            [ 'restaurants' => $restaurants ]);
    }

    /**
    * @Route("restaurants/create")
    */
    public function Create()
    {
        return $this->render('Restaurant/create.html.twig');
    }

    /**
    * @Route("restaurants/{restaurant_id}", name="restaurant_details", requirements={"restaurant_id"="\d+"})
    */
    public function Details($restaurant_id)
    {
        $restaurant = $this->getDoctrine()
            ->getRepository(Restaurant::class)
            ->find($restaurant_id);

        return $this->render('Restaurant/details.html.twig', array(
            'restaurant' => $restaurant,
        ));
    }
}