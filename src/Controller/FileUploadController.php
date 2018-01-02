<?php

namespace App\Controller;

use App\Entity\Comment;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\UserInterface;

class FileUploadController extends Controller
{
    /**
     * @Route("/file_upload/change_avatar", name="change_avatar")
     * @param Request $request
     * @param UserInterface $user
     * @return Response
     */
    public function changeAvatar(Request $request, UserInterface $user)
    {
        $fs = new Filesystem();

        if ($user->getAvatarName()) {
            $fs->remove('uploads/avatars/' . $user->getAvatarName());
        }

        $file = $request->files->get('file');
        $fileName = md5(uniqid()) . '.' . $file->guessExtension();

        $file->move($this->getParameter('avatars_directory'), $fileName);

        $user->setAvatarName($fileName);
        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('profile');
    }
}
