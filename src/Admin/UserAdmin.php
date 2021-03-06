<?php

namespace App\Admin;

use App\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

final class UserAdmin extends AbstractAdmin
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * @var array
     */
    private static $availableUserRoles = [
        'ROLE SUPER ADMIN' => 'ROLE_SUPER_ADMIN',
        'ROLE ADMIN' => 'ROLE_ADMIN',
    ];

    /**
     * UserAdmin constructor.
     * @param string $code
     * @param string $class
     * @param string $baseControllerName
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(string $code, string $class, string $baseControllerName, UserPasswordEncoderInterface $passwordEncoder)
    {
        parent::__construct($code, $class, $baseControllerName);

        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @param User|null $object
     * @return string|null
     */
    public function toString($object): ?string
    {
        return $object instanceof User ? $object->getEmail() : 'User';
    }

    /**
     * @param FormMapper $formMapper
     */
    public function configureFormFields(FormMapper $formMapper): void
    {
        $formMapper
            ->add('email', EmailType::class)
            ->add('roles', ChoiceType::class, [
                'multiple' => true,
                'choices' => self::$availableUserRoles,
            ])
            ->add('plainPassword', PasswordType::class, [
                'label' => 'New Password',
                'mapped' => false,
                'required' => false,
            ])
        ;
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    public function configureDatagridFilters(DatagridMapper $datagridMapper): void
    {
        $datagridMapper
            ->add('email')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    public function configureListFields(ListMapper $listMapper): void
    {
        $listMapper
            ->addIdentifier('id')
            ->add('email')
            ->add('roles', 'choice', [
                'multiple' => true,
                'choices' => self::$availableUserRoles,
            ])
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
     * @param User $object
     */
    public function prePersist($object): void
    {
        $this->encodePassword($object);
    }

    /**
     * @param User $object
     */
    public function preUpdate($object): void
    {
        $this->encodePassword($object);
    }

    /**
     * @param User $user
     */
    private function encodePassword(User $user): void
    {
        $plainPassword = $this
            ->getForm()
            ->get('plainPassword')
            ->getData()
        ;

        if ($plainPassword !== null) {
            $user->setPassword($this->passwordEncoder->encodePassword($user, $plainPassword));
        }
    }
}
