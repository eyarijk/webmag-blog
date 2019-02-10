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
        return $this->render('user/articles/index.html.twig');
    }
}
