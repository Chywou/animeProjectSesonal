<?php

namespace App\Form;

use App\Entity\Anime;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NewAnimeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('aniName', Null, ['label' => 'Nom'])
            ->add('aniFullNB', Null, ['label' => 'Nombre Total d\'épisodes'])
            ->add('aniCurrentNB', Null, ['label' => 'Nombre d\'épisodes vu'])
            ->add('aniLink', Null, ['label' => 'Lien de Streaming'])
            ->add('aniHour', Null, ['label' => 'Heure de sortie'])
            ->add('aniStart', Null, ['label' => 'Date de commencement'])
            ->add('aniDelay', Null, ['label' => 'Délais'])
            ->add('aniImage', Null, ['label' => 'Image'])
            ->add('day', EntityType::class, ['class' =>'App:Day', 'choice_label' => 'dayName'])
            ->add('Statut', EntityType::class, ['class' => 'App:Statut', 'choice_label' => 'staName'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Anime::class,
        ]);
    }
}
