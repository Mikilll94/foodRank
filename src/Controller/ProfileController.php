<?php

namespace App\Controller;

use App\Entity\Comment;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
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
}
