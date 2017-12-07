<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RestaurantController extends Controller
{
    /**
    * @Route("restaurants")
    */
    public function Index()
    {
        return $this->render('Restaurant/index.html.twig');
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