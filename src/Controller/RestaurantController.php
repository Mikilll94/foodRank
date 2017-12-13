<?php
namespace App\Controller;

use App\Entity\Restaurant;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
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
    public function Details($restaurant_id, Request $request)
    {
        $restaurant = $this->getDoctrine()
            ->getRepository(Restaurant::class)
            ->find($restaurant_id);

        $form = $this->createFormBuilder()
            ->add('rate', ChoiceType::class, array(
                'choices' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5'
                ),
                'expanded' => true,
                'multiple' => false,
            ))
            ->add('content', TextareaType::class)
            ->getForm();

        $form->handleRequest($request);

        return $this->render('Restaurant/details.html.twig', array(
            'restaurant' => $restaurant,
            'form' => $form->createView()
        ));
    }
}