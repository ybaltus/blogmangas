<?php


namespace YBaltus\RecaptchaBundle\Constraints;


use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;


class RecaptchaValidator extends ConstraintValidator
{

    /**
     * @var RequestStack
     */
    private $requestStack;
    /**
     * @var \ReCaptcha\ReCaptcha
     */
    private $recaptcha_packagist;

    public function __construct(RequestStack $requestStack, string $recaptchaSecretKey)
    {
        $this->requestStack = $requestStack;
        $this->recaptcha_packagist = new \ReCaptcha\ReCaptcha($recaptchaSecretKey);
    }

    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof Recaptcha) {
            throw new UnexpectedTypeException($constraint, Recaptcha::class);
        }

        $request = $this->requestStack->getCurrentRequest();
        $recaptcha_response = $request->request->get('g-recaptcha-response');

        if(empty($recaptcha_response))
        {
            $this->addViolation($constraint);
            return;
        }

        $resp = $this->recaptcha_packagist->setExpectedHostname($request->getHost())
            ->verify($recaptcha_response, $request->getClientIp());

        if ($resp->isSuccess()) {
            // Verified!
        } else {
//            $errors = $resp->getErrorCodes();
            $this->addViolation($constraint);
        }
    }
    private function addViolation($constraint)
    {
        $this->context->buildViolation($constraint->message)->addViolation();
    }

}