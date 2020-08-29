<?php

namespace App\Form;

use App\Entity\Manga;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MangaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('type', ChoiceType::class, array(
                'choices' => $this->inverseTypeManga(),
            ))
            ->add('year')
            ->add('author')
            ->add('city')
            ->add('country')
            ->add('exist_episode')
            ->add('exist_scan')
            ->add('complete')
            ->add('submit', SubmitType::class, array(
                'label' => 'Save',
                'attr' => array(
                    'class' => 'btn btn-primary'
                )
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Manga::class,
            'translation_domain' => 'forms'
        ]);
    }

    private function inverseTypeManga()
    {
        $output = [];
        foreach (Manga::TYPEMANGA as $key=>$type)
        {
            $output[$type] = $key;
        }
        return $output;
    }
}
