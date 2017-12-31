<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Security("is_authenticated()")
 */
class ProfileController extends Controller
{
    /**
     * @Route("/profile", name="profile")
     */
    public function index()
    {
        // replace this line with your own code!
        return $this->render('User/user-profile.html.twig');
    }
}
