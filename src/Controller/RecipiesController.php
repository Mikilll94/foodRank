<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RecipiesController
{
    /**
    * @Route("/getRecipies")
    */
    public function getRecipies()
    {
        return new Response(
            '<html><body><h1>Recipies</h1></body></html>'
        );
    }
}