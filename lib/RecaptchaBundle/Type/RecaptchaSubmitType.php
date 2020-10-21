<?php


namespace YBaltus\RecaptchaBundle\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;
use YBaltus\RecaptchaBundle\Constraints\Recaptcha;

class RecaptchaSubmitType extends AbstractType
{
    /**
     * @var string
     */
    private $siteKey;

    public function __construct(string $siteKey)
    {
        $this->siteKey=$siteKey;
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['siteKey']= $this->siteKey;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'mapped' => false,
            'constraints' => new Recaptcha()
        ));
    }

    public function getBlockPrefix()
    {
        return "recaptcha_submit";
    }

    public function getParent()
    {
        return TextType::class;
    }
}