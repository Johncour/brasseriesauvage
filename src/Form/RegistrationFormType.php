<?php

namespace App\Form;

use DateTime;
use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Votre E-mail',
                'constraints' => [
                    new NotNull([ 'message' => 'L\'e-mail ne peut pas être vide']),
                    // new Assert\IsNull([ 'message' => 'E-mail déjà existant'])
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => 'Mot de passe',
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
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
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'Accepter les C.G.U.',
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Accepter les C.G.U.',
                    ]),
                ],
            ])
            ->add('birthday_date',  DateType::class, [
                'label' => "Date d'anniversaire",
                'widget'      => 'single_text',
                'data' => new DateTime("now"),
                'constraints' => [
                    new Assert\LessThan([
                        'value' => '-18 years',
                        'message' => 'Vous devez être majeur!',
                    ]),
                ],
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
