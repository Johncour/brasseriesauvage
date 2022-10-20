<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label'       => 'Nom',
                'constraints' => [
                    new NotBlank([ 'message' => 'Ce champ ne peut pas être vide'])
                ]
            ])
            ->add('first_name', TextType::class, [
                'label'       => 'Prénom',
                'constraints' => [
                    new NotBlank([ 'message' => 'Ce champ ne peut pas être vide'])
                ]
            ])
            ->add('email', EmailType::class, [
                'label'  => 'E-mail',
                'constraints' => [
                    new NotNull([ 'message' => 'L\'e-mail ne paut pas être vide'])
                ],
            ])
            ->add('subject', TextType::class, [
                'label'       => 'Sujet',
                'constraints' => [
                    new NotBlank([ 'message' => 'Ce champ ne peut pas être vide'])
                ]
            ])
            ->add('message', TextareaType::class, [
                'label'       => 'Votre message',
                'constraints' => [
                    new NotBlank([ 'message' => 'Ce champ ne peut pas être vide'])
                ]
            ])
            ->add('date',  DateType::class, [
                'widget'      => 'single_text',
                'data' => new \DateTime("now")
                ])
            ->add('envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
