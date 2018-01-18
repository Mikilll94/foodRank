<?php

namespace App\Controller;

use App\Entity\Comment;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Security("is_authenticated()")
 */
class ProfileController extends Controller
{
    /**
     * @Route("/profile", name="profile")
     * @param UserInterface $user
     * @return Response
     */
    public function index(UserInterface $user = null)
    {
        $comments = $this->getDoctrine()
            ->getRepository(Comment::class)
            ->findCommentsPostedByUserFromNewest($user);

        return $this->render('User/user_profile.html.twig', ['comments' => $comments]);
    }

    /**
     * @Route("/profile/delete_account", name="delete_account")
     * @param UserInterface $user
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAccount(UserInterface $user)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();
        $this->get('security.token_storage')->setToken(null);
        return $this->redirect('/');
    }

    /**
     * @Route("/profile/change_password", name="change_password")
     * @param Request $request
     * @param UserInterface $user
     * @param UserPasswordEncoderInterface $encoder
     * @return JsonResponse
     */
    public function changePassword(Request $request, UserInterface $user, UserPasswordEncoderInterface $encoder)
    {
        if (!$encoder->isPasswordValid($user, $request->get('old_password'))) {
            return new JsonResponse(['errors' => ['Nieprawidłowe hasło']]);
        }

        $user->setPassword($encoder->encodePassword($user, $request->get('new_password')));
        $this->getDoctrine()->getManager()->flush();
        return new JsonResponse(['errors' => []]);
    }
}
