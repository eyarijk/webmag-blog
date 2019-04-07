<?php

namespace App\Admin;

use App\Entity\Article;
use App\Entity\ArticleImage;
use App\Entity\Category;
use App\Entity\Tag;
use App\Entity\User;
use App\Service\ImageUpload;
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
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Validator\Constraints\Image;
use Twig_Environment;

final class ArticleAdmin extends AbstractAdmin
{
    /**
     * @var ImageUpload
     */
    private $imageUpload;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;

    /**
     * @var Twig_Environment
     */
    private $twig;

    /**
     * ArticleAdmin constructor.
     * @param string $code
     * @param string $class
     * @param string $baseControllerName
     * @param ImageUpload $imageUpload
     * @param TokenStorageInterface $tokenStorage
     * @param Twig_Environment $twig
     */
    public function __construct(
        string $code,
        string $class,
        string $baseControllerName,
        ImageUpload $imageUpload,
        TokenStorageInterface $tokenStorage,
        Twig_Environment $twig
    ) {
        parent::__construct($code, $class, $baseControllerName);

        $this->twig = $twig;
        $this->imageUpload = $imageUpload;
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @param Article|null $object
     * @return string|null
     */
    public function toString($object): ?string
    {
        return $object instanceof Article ? $object->getTitle() : 'Article';
    }

    /**
     * @param Article $article
     */
    public function prePersist($article): void
    {
        $token = $this->tokenStorage->getToken();

        if ($token !== null) {
            /**
             * @var User $user
             */
            $user = $token->getUser();
            $article->setUser($user);
        }

        $this->setArticleImages($article);
    }

    /**
     * @param Article $article
     */
    public function preUpdate($article): void
    {
        $this->prePersist($article);
    }

    /**
     * @param FormMapper $formMapper
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    protected function configureFormFields(FormMapper $formMapper): void
    {
        /**
         * @var Article $article
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

        $headerImage = $article->getHeaderImage();

        if ($headerImage !== null) {
            $headerImageFieldOptions['help'] = $this->helpImage($headerImage);
        }

        $mainImage = $article->getMainImage();

        if ($mainImage !== null) {
            $mainImageFileFieldOptions['help'] = $this->helpImage($mainImage);
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
     * @param ArticleImage $articleImage
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     * @return string
     */
    private function helpImage(ArticleImage $articleImage): string
    {
        return $this->twig->render('sonata/partials/_help_image.html.twig', [
            'articleImage' => $articleImage,
        ]);
    }

    /**
     * @param Article $article
     */
    private function setArticleImages(Article $article): void
    {
        /**
         * @var Form $form
         */
        $form = $this->getForm();

        $mainImageFile = $form
            ->get('mainImageFile')
            ->getData()
        ;

        $headerImageFile = $form
            ->get('headerImageFile')
            ->getData()
        ;

        if ($mainImageFile instanceof UploadedFile) {
            $mainImageFileName = $this->imageUpload->upload($mainImageFile);

            $articleImage = new ArticleImage();
            $articleImage->setName($mainImageFileName);

            $article->setMainImage($articleImage);
        }

        if ($headerImageFile instanceof UploadedFile) {
            $headerImageFileName = $this->imageUpload->upload($headerImageFile);

            $articleImageHeader = new ArticleImage();
            $articleImageHeader->setName($headerImageFileName);

            $article->setHeaderImage($articleImageHeader);
        }
    }
}
