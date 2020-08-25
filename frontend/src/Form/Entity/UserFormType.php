<?php

namespace App\Form\Entity;

use App\Entity\Character;
use App\Entity\User;
use App\Repository\CharacterRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class UserFormType
 * @package App\Form\Entity
 */
class UserFormType extends AbstractType {

    private CharacterRepository $characterRepository;

    public function __construct(CharacterRepository $characterRepository) {

        $this->characterRepository = $characterRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder
            ->setAction($options['action'])
            ->setMethod($options['method'])
            ->add('username', TextType::class, [
                'row_attr' => ['class' => 'form-group'],
                'icon' => 'fa-signature',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Please fill in a username'
                ]
            ])
            ->add('email', EmailType::class, [
                'row_attr' => ['class' => 'form-group'],
                'icon' => 'fa-envelope',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Please fill in an email address'
                ]
            ])
            ->add('password', PasswordType::class, [
                'row_attr' => ['class' => 'form-group'],
                'icon' => 'fa-lock',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Please fill in a password'
                ]
            ])
            ->add('roles', ChoiceType::class, [
                'row_attr' => ['class' => 'form-group'],
                'icon' => 'fa-user-tag',
                'attr' => [
                    'class' => 'form-control'
                ],
                'choices' => [
                    'User'          => 'ROLE_USER',
                    'Administrator' => 'ROLE_ADMIN'
                ],
                'multiple' => true,
                'expanded' => true
            ])
            ->add('characters', EntityType::class, [
                'row_attr' => ['class' => 'form-group'],
                'icon' => 'fa-users',
                'class' => Character::class,
                'choice_label' => 'name',
                'choices' => $this->characterRepository->findBy([], ['name' => 'ASC']),
                'multiple' => true,
                'expanded' => true
            ])
            ->add('Submit', SubmitType::class, [
                'row_attr' => ['class' => 'd-flex justify-content-center'],
                'attr' => ['class' => 'btn btn-primary']
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver) {

        $resolver->setDefaults([
            'data_class' => User::class,
            'action' => '',
            'method' => ''
        ]);

        $resolver->setAllowedTypes('action', 'string');
        $resolver->setAllowedTypes('method', 'string');
        $resolver->setAllowedValues('method', ['PUT', 'PATCH']);
    }
}
