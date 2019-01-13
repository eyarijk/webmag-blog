<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ArticleController extends AbstractController
{
    /**
     * @param Article $article
     * @return Response
     */
    public function index(Article $article): Response
    {
        return $this->render('articles/index.html.twig', [
            'article' => $article,
        ]);
    }
}
