<?php

namespace App\Controller\Admin;

use App\Entity\Tag;
use App\Form\TagType;
use App\Repository\TagRepository;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @IsGranted("ROLE_SUPER_ADMIN")
 */
class TagsController extends AbstractController
{
    /**
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @param TagRepository $tagRepository
     * @return Response
     */
    public function index(PaginatorInterface $paginator, Request $request, TagRepository $tagRepository): Response
    {
        $tagsQuery = $tagRepository->getSortByIdDescQuery();

        $tags = $paginator->paginate(
            $tagsQuery,
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('admin/tags/index.html.twig', [
            'tags' => $tags,
        ]);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $tag = new Tag();

        $form = $this->createForm(TagType::class, $tag, [
            'labelForSubmit' => 'Create',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tag = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tag);
            $entityManager->flush();

            return $this->redirectToRoute('tags_index');
        }

        return $this->render('admin/tags/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Tag $tag
     * @param Request $request
     * @return Response
     */
    public function edit(Tag $tag, Request $request): Response
    {
        $form = $this->createForm(TagType::class, $tag, [
            'labelForSubmit' => 'Update',
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tag = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tag);
            $entityManager->flush();

            return $this->redirectToRoute('tags_index');
        }

        return $this->render('admin/tags/edit.html.twig', [
            'form' => $form->createView(),
            'tag' => $tag,
        ]);
    }

    /**
     * @param Tag $tag
     * @return Response
     */
    public function delete(Tag $tag): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($tag);
        $entityManager->flush();

        return $this->redirectToRoute('tags_index');
    }
}
