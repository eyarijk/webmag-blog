<?php

namespace App\Admin;

use App\Entity\Category;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DoctrineORMAdminBundle\Filter\BooleanFilter;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class CategoryAdmin extends AbstractAdmin
{
    /**
     * @param Category $object
     * @return string
     */
    public function toString($object): string
    {
        return $object instanceof Category ? $object->getTitle() : 'Category';
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->add('title', TextType::class)
            ->add('color', TextType::class, [
                'label' => 'Color for background',
                'attr' => [
                    'class' => 'form-control jscolor {hash:true}',
                ],
            ])
            ->add('isEnabled', CheckboxType::class)
            ->add('isShowMenu', CheckboxType::class, [
                'label' => 'Is Show In Menu?',
            ])
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('title')
            ->add('color')
            ->add('isEnabled', BooleanFilter::class)
            ->add('isShowMenu', BooleanFilter::class)
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->addIdentifier('id')
            ->add('title')
            ->add('color', null, [
                'template' => '/sonata/partials/_color_field_list.html.twig',
            ])
            ->add('isEnabled')
            ->add('isShowMenu')
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
