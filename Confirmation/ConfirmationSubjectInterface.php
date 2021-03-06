<?php

namespace DoS\UserBundle\Confirmation;

interface ConfirmationSubjectInterface
{
    public function getConfirmationChannel($propertyPath);

    public function getConfirmationToken();

    public function setConfirmationToken($token);

    public function getConfirmationType();

    public function setConfirmationType($type);

    /**
     * @return \DateTime
     */
    public function getConfirmationRequestedAt();

    public function setConfirmationRequestedAt(\DateTime $dateTime = null);

    public function getConfirmationConfirmedAt();

    public function setConfirmationConfirmedAt(\DateTime $dateTime = null);

    public function isConfirmationConfirmed();

    public function confirmationRequest($token);

    public function confirmationConfirm();
    public function confirmationDisableAccess();
    public function confirmationEnableAccess();
}
