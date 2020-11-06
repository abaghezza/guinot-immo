<?php

namespace App\Form;

use App\Entity\GuinotVente;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GuinotVenteFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('createdAt')
            ->add('denomination')
            ->add('categorie')
            ->add('photo')
            ->add('description')
            ->add('surface')
            ->add('type_maison')
            ->add('chambre')
            ->add('etage')
            ->add('cout')
            ->add('adresse')
            ->add('accessibilite')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => GuinotVente::class,
        ]);
    }
}
