<?php

namespace App\Controller;

use App\DTO\SearchDTO;
use App\Entity\Article;
use App\Form\SearchType;
use FOS\ElasticaBundle\Manager\RepositoryManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use WhiteOctober\BreadcrumbsBundle\Model\Breadcrumbs;

class SearchController extends AbstractController
{
    /**
     * @param Request $request
     * @param RepositoryManagerInterface $repositoryManager
     * @param Breadcrumbs $breadcrumbs
     * @return Response
     */
    public function index(Request $request, RepositoryManagerInterface $repositoryManager, Breadcrumbs $breadcrumbs): Response
    {
        $searchForm = $this->createForm(SearchType::class);
        $searchForm->handleRequest($request);

        /**
         * @var SearchDTO
         */
        $searchData = $searchForm->getData();
        $query = $searchData->getQuery();

        $articles = [];

        if ($query !== null) {
            $articles = $repositoryManager
                ->getRepository(Article::class)
                ->find($query)
            ;
        }

        $breadcrumbs
            ->addRouteItem('breadcrumbs.home', 'home')
            ->addItem('breadcrumbs.search')
        ;

        return $this->render('search/index.html.twig', [
            'query' => $query,
            'articles' => $articles,
        ]);
    }
}
