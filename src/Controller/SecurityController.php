<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Service\EmailSender;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    private $email_sender;

    /**
     * SecurityController constructor.
     * @param EmailSender $email_sender
     */
    public function __construct(EmailSender $email_sender)
    {
        $this->email_sender = $email_sender;
    }

    /**
     * @Route("/login", name="login")
     * @return Response
     */
    public function login()
    {
        return new JsonResponse([]);
    }

    /**
     * @Route("/register", name="user_registration")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $this->email_sender->sendMail('Rejestracja w serwisie FoodRank',
                $this->renderView('Emails/registration.html.twig', ['name' => $user->getUsername()]),
                $user->getEmail());

            return $this->redirect('/');
        }

        return $this->render('Security/register.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {
    }
}
