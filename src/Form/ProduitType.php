<?php

namespace App\Form;

use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextareaType::class, [
                "label" => 'Nom du produit *',
                'attr' => [
                    "placeholder" => "saisissez le nom du produit",
                    "class" => "border border-danger border-2 rounded"
                ],
                'help' => '5 caractères minimum',
                'label_attr' => [
                    'id' => 'label_titre',
                    'class' => 'text-success'
                ],
                'help_attr' => [
                    'class' => 'text-warning'
                ],
                'row_attr' => [
                    'class' => 'shadow p-2'
                ],
            ])
            ->add('prix', MoneyType::class, [
                'currency' => 'USD',
                "label" => 'Prix du produit *',
                'attr' => [
                    "placeholder" => "saisissez le nom du produit",
                    "class" => "border border-info border-2 rounded"
                ],
                'help' => 'en euro',
                'label_attr' => [
                    'class' => 'text-info'
                ],
                'help_attr' => [
                    'class' => 'text-warning'
                ],
                'row_attr' => [
                    'class' => 'shadow p-2'
                ],
            ])
            ->add('description', TextType::class,[
                'required' => false,
                "label" => 'Description du produit (facultatif)',
                'attr' => [
                    "placeholder" => "saisissez la description du produit",
                    "class" => "border border-warning border-2 rounded",
                    'rows' => 5
                ],
                'help' => '200 caractères minimum',
                'label_attr' => [
                    'class' => 'text-info'
                ],
                'help_attr' => [
                    'class' => 'text-success'
                ],
                'row_attr' => [
                    'class' => 'shadow p-2'
                ],
            ])
            ->add('image')
            ->add('Ajouter', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
