<?php

namespace App\Form;

use DateTime;
use App\Entity\Shop;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ShopType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('order_status', TextType::class, [
                'label'       => "Statut de la commande :",
                'data'        => 'en préparation',
                'disabled'    => true
                ])
            ->add('order_date', DateType::class, [
                'label'       => "date d'achat :",
                'widget'      => 'single_text',
                'data'        => new DateTime("now"),
                'disabled'    => true
                ])
            ->add('shipping_date', DateType::class, [
                'label'       => "date de livraison estimée :",
                'widget'      => 'single_text',
                'data'        => new DateTime("now +7days"),
                'disabled'    => true
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Shop::class,
        ]);
    }
}
