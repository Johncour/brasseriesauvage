<?php

namespace App\Form;

use App\Entity\Beer;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class BeerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder   
            ->add('name', TextType::class, [
                'label'       => 'Nom de la bière',
                'constraints' => [
                    new NotBlank([ 'message' => 'Ce champ ne peut pas être vide'])
                ]
            ])
            ->add('category', EntityType::class, [
                'label'       => 'Categorie de la bière',
                'class'       => Category::class,
            ])
            ->add('p1', TextareaType::class, [
                'label'       => '1er paragraphe',
                'constraints' => [
                    new NotBlank([ 'message' => 'Ce champ ne peut pas être vide'])
                ]
            ])
            ->add('p2', TextareaType::class, [
                'label'       => '2ème paragraphe (optionnel)',
                'required'    => false
            ])
            ->add('alcool', NumberType::class, [
                'label'       => "Taux d'alcool en %",
                'constraints' => [new Positive()],
                'attr' => [
                    'min' => 0
                ]
            ])
            ->add('color', TextType::class, [
                'label'       => 'Couleur',
                'constraints' => [
                    new NotBlank([ 'message' => 'Ce champ ne peut pas être vide'])
                ]
            ])
            ->add('price', NumberType::class, [
                'label'       => "Prix en Euro",
                'constraints' => [new Positive()],
                'attr' => [
                    'min' => 0
                ]
            ])
            ->add('volume', IntegerType::class, [
                'label'       => "Volume en cl",
                'constraints' => [new Positive()],
                'attr' => [
                    'min' => 0
                ]
            ])
            ->add('quantity', IntegerType::class, [
                'label'       => "Quantité en stock actuellement",
                'constraints' => [new Positive()],
                'attr' => [
                    'min' => 0
                ]
            ])
            ->add('date',  DateType::class, [
                'label'       => 'Date de création',
                'widget'      => 'single_text',
                ])
            ->add('photo', TextType::class, [
                'label'        => 'Nom de la photo (avec le format)',
                'constraints'  => [
                    new NotBlank([ 'message' => 'Ce champ ne peut pas être vide'])
                ]
            ])
            ->add('image', FileType::class, [
                'label'        => 'Téléchargement de la photo (559x843 obligatoire)',
                'mapped'       => false,
                'required'     => false,
                'constraints'  => [
                    new File([
                        'mimeTypes' => [ "image/jpg", "image/jpeg", "image/png", "image/gif" ],
                        'mimeTypesMessage' => "Les formats autorisés sont jpeg, gif, jpg, png",
                        'maxSize' =>"2048k",
                        'maxSizeMessage' => "Le fichier ne peut pas peser plus de 2Mo"
                    ])
                ]
                ])
            ->add('enregistrer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Beer::class,
        ]);
    }
}
