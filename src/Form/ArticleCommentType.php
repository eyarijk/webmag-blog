<?php

namespace App\Form;

use App\Entity\ArticleComment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleCommentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                'label' => 'Email',
                'attr' => [
                    'placeholder' => 'Email',
                ],
            ])
            ->add('name', TextType::class, [
                'label' => 'Name',
                'attr' => [
                    'placeholder' => 'Name',
                ],
            ])
            ->add('website', TextType::class, [
                'label' => 'Website',
                'attr' => [
                    'placeholder' => 'Website',
                ],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Comment',
                'attr' => [
                    'placeholder' => 'Message',
                ],
            ])
            ->add('parentCommentId', HiddenType::class, [
                'mapped' => false,
            ])
            ->add('create', SubmitType::class, [
                'label' => 'Submit',
                'attr' => [
                    'class' => 'primary-button',
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
            'data_class' => ArticleComment::class,
        ]);
    }
}
