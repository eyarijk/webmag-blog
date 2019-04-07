<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Form\CategoryType;
use App\Repository\CategoryRepository;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @IsGranted("ROLE_SUPER_ADMIN")
 */
class CategoriesController extends AbstractController
{
    /**
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @param CategoryRepository $categoryRepository
     * @return Response
     */
    public function index(PaginatorInterface $paginator, Request $request, CategoryRepository $categoryRepository): Response
    {
        $categoriesQuery = $categoryRepository->getSortByIdDescQuery();

        $categories = $paginator->paginate(
            $categoriesQuery,
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('admin/categories/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $category = new Category();

        $form = $this->createForm(CategoryType::class, $category, [
            'labelForSubmit' => 'Create',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tag = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tag);
            $entityManager->flush();

            return $this->redirectToRoute('categories_index');
        }

        return $this->render('admin/categories/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Category $category
     * @param Request $request
     * @return Response
     */
    public function edit(Category $category, Request $request): Response
    {
        $form = $this->createForm(CategoryType::class, $category, [
            'labelForSubmit' => 'Update',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tag = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tag);
            $entityManager->flush();

            return $this->redirectToRoute('categories_index');
        }

        return $this->render('admin/categories/edit.html.twig', [
            'form' => $form->createView(),
            'category' => $category,
        ]);
    }

    /**
     * @param Category $category
     * @return Response
     */
    public function delete(Category $category): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($category);
        $entityManager->flush();

        return $this->redirectToRoute('categories_index');
    }
}
