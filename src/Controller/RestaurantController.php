<?php
namespace App\Controller;

use App\Entity\Restaurant;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Debug\Debug;

class RestaurantController extends Controller
{
    /**
    * @Route("restaurants")
    */
    public function Index()
    {
        Debug::enable();
        $restaurants = $this->getDoctrine()
            ->getRepository(Restaurant::class)->findAll();

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
    * @Route("restaurants/details/{restaurantId}")
    */
    public function Details($restaurantId)
    {
        return $this->render('Restaurant/details.html.twig', array(
            'restaurantId' => $restaurantId,
        ));
    }
}