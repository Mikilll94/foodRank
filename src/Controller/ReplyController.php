<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Reply;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

class ReplyController extends Controller
{
    /**
     * @Route("/reply/add", name="reply")
     * @param Request $request
     * @param UserInterface $user
     * @return JsonResponse
     */
    public function index(Request $request, UserInterface $user)
    {
        $reply = new Reply();
        $reply->setAuthor($user);
        $reply->setContent($request->get('content'));
        $reply->setPostingDate(new \DateTime('now'));
        $em = $this->getDoctrine()->getManager();
        $comment = $em->getRepository(Comment::class)->find($request->get('commentId'));
        $reply->setComment($comment);

        $errors = [];
        $validator = $this->get('validator');
        $errorsValidator = $validator->validate($reply);
        foreach ($errorsValidator as $error) {
            array_push($errors, $error->getMessage());
        }

        if (count($errors) == 0) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reply);
            $em->flush();
            return new JsonResponse(['errors' => [], 'reply_id' => $reply->getId()]);
        } else {
            return new JsonResponse(['errors' => $errors]);
        }
    }
}
