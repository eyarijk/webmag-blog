<?php

namespace App\Form;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Tag;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->setMethod('POST')
            ->add('title', TextType::class, [
                'label' => 'Title',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'attr' => [
                    'class' => 'form-control select2',
                ],
                'choice_label' => 'title',
                'label' => 'Category',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.title', 'ASC');
                },
            ])
            ->add('tags', EntityType::class, [
                'class' => Tag::class,
                'attr' => [
                    'class' => 'form-control select2',
                ],
                'choice_label' => 'title',
                'label' => 'Tags',
                'multiple' => true,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->orderBy('t.title', 'ASC');
                },
            ])
            ->add('isEnabled', CheckboxType::class, [
                'label' => 'Is Enabled?',
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => [
                    'class' => 'form-control tinymce',
                ],
            ])
            ->add('shortDescription', TextareaType::class, [
                'label' => 'Short Description',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('mainImage', FileType::class, [
                'label' => 'Main Image',
                'data_class' => null,
                'attr' => [
                    'class' => 'form-control-file',
                ],
            ])
            ->add('create', SubmitType::class, [
                'label' => $options['labelForSubmit'],
                'attr' => [
                    'class' => 'btn btn-secondary btn-sm',
                ],
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
            'labelForSubmit' => 'Create',
        ]);
    }
}
