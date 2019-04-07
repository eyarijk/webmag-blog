<?php

namespace App\Admin;

use App\Entity\Article;
use App\Entity\ArticleComment;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DoctrineORMAdminBundle\Filter\DateTimeFilter;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class ArticleCommentAdmin extends AbstractAdmin
{
    /**
     * @param ArticleComment|null $object
     * @return string|null
     */
    public function toString($object): ?string
    {
        return $object instanceof ArticleComment ? $object->getEmail() : 'Comment';
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->add('email', TextType::class)
            ->add('name', TextType::class)
            ->add('website', TextType::class, [
                'required' => false,
            ])
            ->add('parent', EntityType::class, [
                'label' => 'Parent comment',
                'choice_label' => 'name',
                'class' => ArticleComment::class,
                'required' => false,
            ])
            ->add('article', EntityType::class, [
                'choice_label' => 'title',
                'class' => Article::class,
            ])
            ->add('description')
            ->add('createdAt', DateTimeType::class)
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('email')
            ->add('name')
            ->add('website')
            ->add('parent.name')
            ->add('article.title')
            ->add('createdAt', DateTimeFilter::class)
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->addIdentifier('id')
            ->add('email')
            ->add('name')
            ->add('description')
            ->add('article.title')
            ->add('parent', null, [
                'label' => 'Parent Comment',
                'template' => '/sonata/partials/_parent_comment_field_list.html.twig',
            ])
            ->add('createdAt')
            ->add('_action', 'actions', [
                    'actions' => [
                        'edit' => [],
                        'delete' => [],
                    ],
                ]
            )
        ;
    }
}
