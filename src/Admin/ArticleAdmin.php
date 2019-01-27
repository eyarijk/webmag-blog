<?php

namespace App\Admin;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Tag;
use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\DoctrineORMAdminBundle\Filter\BooleanFilter;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\Image;

final class ArticleAdmin extends AbstractAdmin
{
    /**
     * @param Article $object
     * @return string
     */
    public function toString($object): string
    {
        return $object instanceof Article ? $object->getTitle() : 'Article';
    }

    /**
     * @param Article $article
     */
    public function prePersist($article): void
    {
        $this->persistUpdateArticle($article);
    }

    /**
     * @param Article $article
     */
    public function preUpdate($article): void
    {
        $this->persistUpdateArticle($article);
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper): void
    {
        /**
         * @var Article|null
         */
        $article = $this->getSubject();

        $mainImageFileFieldOptions = $headerImageFieldOptions = [
            'mapped' => false,
            'required' => false,
            'constraints' => [
                new Image([
                    'maxSize' => '5M',
                ]),
            ],
        ];

        if ($article !== null) {
            if ($article->getHeaderImage() !== null) {
                $headerImageFieldOptions['help'] = $this->helpImage($article->getHeaderImage());
            }

            if ($article->getMainImage() !== null) {
                $mainImageFileFieldOptions['help'] = $this->helpImage($article->getMainImage());
            }
        }

        $formMapper
            ->add('title', TextType::class)
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'title',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('c')
                        ->orderBy('c.title', 'ASC');
                },
            ])
            ->add('tags', EntityType::class, [
                'class' => Tag::class,
                'choice_label' => 'title',
                'multiple' => true,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->orderBy('t.title', 'ASC');
                },
            ])
            ->add('isEnabled', CheckboxType::class, [
                'required' => false,
            ])
            ->add('isMain', CheckboxType::class, [
                'required' => false,
            ])
            ->add('description', TextareaType::class)
            ->add('shortDescription', TextareaType::class)
            ->add('mainImageFile', FileType::class, $mainImageFileFieldOptions)
            ->add('headerImageFile', FileType::class, $headerImageFieldOptions)
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('title')
            ->add('category.title')
            ->add('tags.title')
            ->add('isEnabled', BooleanFilter::class)
            ->add('isMain', BooleanFilter::class)
            ->add('shortDescription')
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
            ->add('category.title')
            ->add('isEnabled')
            ->add('isMain')
            ->add('shortDescription')
            ->add('_action', 'actions', [
                    'actions' => [
                        'edit' => [],
                        'delete' => [],
                    ],
                ]
            )
        ;
    }

    /**
     * @param string $imageFileName
     * @return string
     */
    private function helpImage(string $imageFileName): string
    {
        $imagesPublicPath = $this
            ->getConfigurationPool()
            ->getContainer()
            ->getParameter('images_public_path')
        ;

        $imagesPublicPath = rtrim($imagesPublicPath, '/') . '/';

        return '<img src="' . $imagesPublicPath . $imageFileName . '" style="max-height:200px;max-width:200px"/>';
    }

    /**
     * @param Article $article
     */
    private function persistUpdateArticle(Article $article): void
    {
        $form = $this->getForm();

        $container = $this
            ->configurationPool
            ->getContainer()
        ;

        $user = $container
            ->get('security.token_storage')
            ->getToken()
            ->getUser()
        ;

        $mainImageFile = $form
            ->get('mainImageFile')
            ->getData()
        ;

        $headerImageFile = $form
            ->get('headerImageFile')
            ->getData()
        ;

        $imageUpload = $container->get('image.upload');

        if ($mainImageFile instanceof UploadedFile) {
            $mainImageFileName = $imageUpload->upload($mainImageFile);

            $article->setMainImage($mainImageFileName);
        }

        if ($headerImageFile instanceof UploadedFile) {
            $headerImageFileName = $imageUpload->upload($headerImageFile);

            $article->setHeaderImage($headerImageFileName);
        }

        $article->setUser($user);
    }
}
