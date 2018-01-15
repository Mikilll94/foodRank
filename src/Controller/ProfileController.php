<?php

namespace App\Controller;

use App\Entity\Comment;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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
}
