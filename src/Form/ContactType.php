<?php

namespace App\Form;

use App\Entity\Contact;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use YBaltus\RecaptchaBundle\Type\RecaptchaSubmitType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('phone', TextType::class, array(
                'required' => false
            ))
            ->add('email', EmailType::class)
            -> add('message', TextareaType::class)
//            ->add('submit', SubmitType::class, array(
//                'label' => "Save",
//                'attr' => array(
//                    'class' => 'btn btn-primary'
//                )
//            ))
            ->add('captcha',  RecaptchaSubmitType::class, array(
                'label'=> "Save",
                'attr' => array(
                    'class' => 'btn btn-primary '
                ),

            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
            'translation_domain' => 'forms'
        ]);
    }
}
