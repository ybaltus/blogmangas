<?php

namespace App\Form;

use App\Entity\Manga;
use App\Entity\MangaSearch;
use App\Entity\Options;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MangaSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type', ChoiceType::class, array(
                'choices' => $this->inverseTypeManga(),
                'required' => false,
                'placeholder' => 'Tout les types'
            ))
            ->add('minYear', IntegerType::class, array(
                'data' => '1960',
                'required' => false,
                'label' => 'Année minimum',
                'attr'=>array(
                    'placeholder' => 'Année min',
                    'min' => '1960',
                    'max' => '2020',
                )
            ))
            ->add('maxYear', IntegerType::class, array(
                'data' => '2020',
                'required' => false,
                'label' => 'Année maximum',
                'attr'=>array(
                    'placeholder' => 'Année max',
                    'min' => '1960',
                    'max' => '2020',
                )
            ))
            ->add('complete', CheckboxType::class, array(
                'label' =>'Complété ?',
                'required' => false
            ))
            ->add('options', EntityType::class, array(
                'required' => false,
                'class' => Options::class,
                'choice_label' => 'name',
                'multiple' =>true
            ))
            ->add('submit', SubmitType::class, array(
                'label' => "Filtrer",
                'attr' => array(
                    'class' => 'btn btn-primary'
                )
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MangaSearch::class,
            'method' => 'GET',
            'csrf_protection'=> false
        ]);
    }
    
    public function getBlockPrefix()
    {
        return '';
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
