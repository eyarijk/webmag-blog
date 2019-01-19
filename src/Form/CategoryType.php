<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Title',
                'attr' => [
                    'class' => 'form-control',
                ],
            ])
            ->add('color', TextType::class, [
                'label' => 'Color for background',
                'attr' => [
                    'class' => 'form-control jscolor {hash:true}',
                ],
            ])
            ->add('isEnabled', CheckboxType::class, [
                'label' => 'Is Enabled?',
            ])
            ->add('isShowMenu', CheckboxType::class, [
                'label' => 'Is Show In Menu?',
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
            'data_class' => Category::class,
            'labelForSubmit' => 'Create',
        ]);
    }
}
