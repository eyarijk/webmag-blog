<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CategoryController extends AbstractController
{
    /**
     * @param string $categorySlug
     * @return Response
     */
    public function index(string $categorySlug): Response
    {
        $category = $this
            ->getDoctrine()
            ->getRepository(Category::class)
            ->findEnableBySlug($categorySlug)
        ;

        if ($category === null) {
            throw new NotFoundHttpException('Category (slug: ' . $categorySlug . ' ) not found!');
        }

        return $this->render('category/index.html.twig',[
            'category' => $category
        ]);
    }
}
