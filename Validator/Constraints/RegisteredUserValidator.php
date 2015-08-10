<?php

namespace DoS\UserBundle\Validator\Constraints;

use Sylius\Component\Resource\Repository\RepositoryInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class RegisteredUserValidator extends ConstraintValidator
{
    public $message;
    public $emailMessage;
    public $mobileMessage;

    /**
     * @var RepositoryInterface
     */
    private $customerRepository;

    /**
     * @param RepositoryInterface $customerRepository
     */
    public function __construct(RepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function validate($customer, Constraint $constraint)
    {
        if ($email = $customer->getEmail()) {
            $existingEmail = $this->customerRepository->findOneBy(array('email' => $email));

            if (null !== $existingEmail
                && null !== $existingEmail->getUser()
                && $existingEmail->getId() !== $customer->getId()
            ) {
                $this->context->addViolationAt('email', $constraint->emailMessage ?: $constraint->message, array(), null);
            }
        }

        if ($mobile = $customer->getMobile()) {
            $existingMobile = $this->customerRepository->findOneBy(array('mobile' => $mobile));

            if (null !== $existingMobile
                && null !== $existingMobile->getUser()
                && $existingMobile->getId() !== $customer->getId()
            ) {
                $this->context->addViolationAt('mobile', $constraint->mobileMessage ?: $con->message, array(), null);
            }
        }
    }
}
