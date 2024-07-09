<?php

namespace App\Form;

use App\Entity\Medal;
use App\Entity\Nation;
use App\Entity\Sport;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedalFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('color')
            ->add('category')
            ->add('point')
            ->add('sport', EntityType::class, [
                'class' => Sport::class,
                'choice_label' => 'fullName',
            ])
            ->add('nation', EntityType::class, [
                'class' => Nation::class,
                'choice_label' => 'name',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Medal::class,
        ]);
    }
}
