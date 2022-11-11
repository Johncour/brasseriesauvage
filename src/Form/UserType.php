<?php

namespace App\Form;

use App\Entity\Beer;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $user = $options["data"];
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Votre E-mail',
                'constraints' => [
                    new NotNull([ 'message' => 'L\'e-mail ne paut pas être vide'])
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => 'Mot de passe',
                'mapped' => false,
                'required' => $user->getId() ? false : true,
                'attr' => [
                    'autocomplete' => 'new-password',
                    "placeholder" => "********"
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un mot de passe',
                    ]),
                    new Length([
                        'min' => 4,
                        'minMessage' => 'Votre mot de passe doit comporter {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 50,
                    ]),
                    new Regex([
                        "pattern" => "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$/",
                        "message" => "Le mot de passe n'est pas valide",
                    ])
                ],
                "help" => "Doit comporter au moins 1 majuscule, 1 minuscule, 1 chiffre et un caractère spécial (-+!*$@%_), et entre 4 et 50 caractères"
            ])
            ->add('last_name', TextType::class, [
                'label' => 'Votre Nom',
                'constraints' => [
                    new NotBlank([ 'message' => 'Ce champ ne peut pas être vide'])
                ]
            ])
            ->add('first_name', TextType::class, [
                'label' => 'Votre Prénom',
                'constraints' => [
                    new NotBlank([ 'message' => 'Ce champ ne peut pas être vide'])
                ]
            ])
            ->add('pseudo', TextType::class, [
                'label' => 'Votre pseudo (facultatif)',
                'required' => false,
            ])
            ->add('adress', TextType::class, [
                'label' => 'Votre adresse',
                'constraints' => [
                    new NotBlank([ 'message' => 'Ce champ ne peut pas être vide'])
                ]
            ])
            ->add('city', TextType::class, [
                'label' => 'Votre Ville',
                'constraints' => [
                    new NotBlank([ 'message' => 'Ce champ ne peut pas être vide'])
                ]
            ])
            ->add('postalCode', NumberType::class, [
                'label' => 'Votre code postal',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ]),
            ])
            ->add('phone', NumberType::class, [
                'label' => 'Votre numéro de téléphone',
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30
                ]),
            ])
            ->add('birthday_date',  DateType::class, [
                'label' => "Date d'anniversaire",
                'widget'      => 'single_text',
                'disabled'    => true
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
