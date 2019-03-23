<?php

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    /**
     * @return Response
     */
    public function index(): Response
    {
        $user = $this->getUser();

        return $this->render('user/articles/index.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @return Response
     */
    public function create(): Response
    {
        $user = $this->getUser();

        return $this->render('user/articles/create-edit.html.twig', [
            'user' => $user,
        ]);
    }
}
