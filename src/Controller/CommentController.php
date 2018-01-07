<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\Restaurant;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

class CommentController extends Controller
{
    /**
     * @Route("/comment/add", name="add_comment")
     * @param Request $request
     * @param UserInterface|null $user
     * @return JsonResponse
     */
    public function AddComment(Request $request, UserInterface $user = null)
    {
        if ($user == null) {
            return new JsonResponse(['errors' => ['Tylko zalogowani użytkownicy mogą dodawać komentarze']]);
        }
        $comment = new Comment();
        $comment->setAuthor($user);
        $comment->setRate($request->get('rate'));
        $comment->setContent($request->get('content'));
        $comment->setPostingDate(new \DateTime('now'));

        $em = $this->getDoctrine()->getManager();
        $restaurant = $em->getRepository(Restaurant::class)->find($request->get('restautantId'));
        $comment->setRestaurant($restaurant);

        $errors = [];
        $validator = $this->get('validator');
        $errorsValidator = $validator->validate($comment);
        foreach ($errorsValidator as $error) {
            array_push($errors, $error->getMessage());
        }

        if (count($errors) == 0) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comment);
            $em->flush();
            return new JsonResponse(['errors' => []]);
        } else {
            return new JsonResponse(['errors' => $errors]);
        }
    }


    /**
     * @Route("/comment/edit", name="edit_comment")
     * @param Request $request
     * @param UserInterface|null $user
     * @return JsonResponse
     */
    public function EditComment(Request $request, UserInterface $user = null)
    {
        $em = $this->getDoctrine()->getManager();
        $commentToUpdate = $em->getRepository(Comment::class)->find($request->get('postId'));
        $commentToUpdate->setContent($request->get('newContent'));
        $commentToUpdate->setRate($request->get('newRate'));
        $em->flush();
        return new JsonResponse(['errors' => []]);
    }
}
