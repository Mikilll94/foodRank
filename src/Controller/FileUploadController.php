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

        $file = $request->files->get('file');
        $stream = fopen($file->getRealPath(), 'rb');

        $user->setAvatar(stream_get_contents($stream));
        $this->getDoctrine()->getManager()->flush();

        return $this->redirectToRoute('profile');
    }
}
