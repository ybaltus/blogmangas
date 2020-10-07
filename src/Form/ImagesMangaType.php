<?php

namespace App\Form;

use App\Entity\ImagesManga;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ImagesMangaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('imageFile', VichImageType::class, array(
                'help' => 'jpeg, png',
                'required' => false,
                'allow_delete' => true,
                'delete_label' => "Supprimer l'image",
                'download_label' => 'Télécharger',
                'download_uri' => true,
                'image_uri' => true,
                'imagine_pattern' => 'mangas_thumb',
                'asset_helper' => true,


            ))

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ImagesManga::class,
            'translation_domain' => 'forms'
        ]);
    }
}
