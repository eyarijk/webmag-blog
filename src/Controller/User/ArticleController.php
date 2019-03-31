<?php

namespace App\Controller\User;

use App\Entity\Article;
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

    /**
     * @param Article $article
     * @return Response
     */
    public function edit(Article $article): Response
    {
        return $this->render('user/articles/create-edit.html.twig', [
            'article' => $article,
        ]);
    }
}
