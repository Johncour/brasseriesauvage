<?php

namespace App\Form;

use App\Entity\Beer;
use App\Entity\Shop;
use App\Entity\User;
use App\Entity\ShopBeer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ShopBeerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('quantity', IntegerType::class, [
                'label'       => " = ",
                'constraints' => [new Positive()],
                'attr' => [
                    'min' => 0
                ]
            ])
            ->add('price_quantity', NumberType::class, [
                'label'       => "€",
                'constraints' => [new Positive()],
                'attr' => [
                    'min' => 0
                ]])
            ->add('beer', EntityType::class, [
                'class'       => Beer::class,
                'choice_label' => 'name',
                'placeholder'  => "",
                'label'       => 'bière'
                ])
            ->add('shop', EntityType::class, [
                'label'       => 'Shop',
                'class'       => User::class,
                'choice_label' => 'id',
                'placeholder'  => "",
                ])
        ;
    }
    // INSERT INTO shop (user_id, order_status, order_date, shipping_date, price_order)
    // VALUES
    // ('1', '2', '2022-12-10', '2022-01-12', 33.3);

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ShopBeer::class,
        ]);
    }
}
