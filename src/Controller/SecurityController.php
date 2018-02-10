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
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
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
     * @Route("/login_json", name="login_json")
     * @return Response
     */
    public function loginViaJSON()
    {
        return new JsonResponse([]);
    }

    /**
     * @Route("/login_form", name="login_form")
     * @param AuthenticationUtils $authUtils
     * @return Response
     */
    public function loginViaForm(AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('Security/login.html.twig', [
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }

    /**
     * @Route("/register", name="registration")
     * @param Request $request
     * @param UserPasswordEncoderInterface $passwordEncoder
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder)
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

            $this->email_sender->sendMail(
                'Rejestracja w serwisie FoodRank',
                $this->renderView('Emails/registration.html.twig', ['name' => $user->getUsername()]),
                $user->getEmail()
            );

            $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
            $this->get('security.token_storage')->setToken($token);
            $this->get('session')->set('_security_main', serialize($token));
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

    /**
     * @Route("/forgot_password", name="forgot_password")
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return JsonResponse
     * @throws \Exception
     */
    public function forgotPassword(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = $this->getDoctrine()->getRepository(User::class)->findOneBy(
            ['email' => $request->get('email')]
        );
        if (!$user) {
            return new JsonResponse(['errors' => ['Niepoprawny adres email']]);
        }

        $random_password = bin2hex(random_bytes(5));
        $encoded = $encoder->encodePassword($user, $random_password);
        $user->setPassword($encoded);
        $this->getDoctrine()->getManager()->flush();

        $this->email_sender->sendMail(
            'Odzyskiwanie hasła w serwisie FoodRank',
            $this->renderView('Emails/forgot_password.html.twig', ['new_password' => $random_password]),
            $user->getEmail()
        );

        return new JsonResponse(['errors' => []]);
    }
}
