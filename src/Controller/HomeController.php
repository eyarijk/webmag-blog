<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     * @return Response
     */
    public function index(): Response
    {
        $articleRepository = $this
            ->getDoctrine()
            ->getRepository(Article::class)
        ;

        $recentArticles = $articleRepository->getRecent();
        $featuredArticles = $articleRepository->getFeatured();
        $mostReadArticles = $articleRepository->getMostRead();
        $countEnabledArticles = $articleRepository->getEnabledCount();

        return $this->render('home.html.twig', [
            'recentArticles' => $recentArticles,
            'featuredArticles' => $featuredArticles,
            'mostReadArticles' => $mostReadArticles,
            'countEnabledArticles' => $countEnabledArticles,
        ]);
    }
}
