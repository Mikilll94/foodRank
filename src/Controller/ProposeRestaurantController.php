<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Security("is_authenticated()")
 */
class ProposeRestaurantController extends Controller
{
    /**
     * @Route("/propose_restaurant", name="propose_restaurant")
     */
    public function index()
    {
        return $this->render('Contact/propose_restaurant.html.twig');
    }
}
