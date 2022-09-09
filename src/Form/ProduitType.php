<?php

namespace App\Form;

use App\Entity\Categorie;
use App\Entity\Produit;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
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
                'constraints' => [
                    new NotBlank([
                        'message' => '5 caractères max !!'
                    ]),
                    new Length([
                        'min' => 5,
                        'max' => 30,
                        'minMessage' => '5 cractères minimum !!',
                        'maxMessage' => '30 caratères max !!'
                    ])
                ]
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
            ->add('description', TextAreaType::class,[
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
            ->add('image', TextType::class, [
                'required' => false,
                "label" => 'Image du produit (facultatif)',
                'attr' => [
                    "placeholder" => "saisissez l'image du produit",
                    "class" => "border border-success border-2 rounded",
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
            ->add('categorie', EntityType::class, [ // sera une relation avec une autre entité
                "class" => Categorie::class, // quelle entité
                "choice_label" => "nom", // quelle propriété
                "label" => 'Nom de la cétégorie',
                "placeholder" => "saisir une catégorie",
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
                'required' => false,
            ])
            //->add('Envoyer', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
