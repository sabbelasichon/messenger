<?php
declare(strict_types=1);


namespace WapplerSystems\Messenger\Exception;


use Symfony\Component\Messenger\Exception\RuntimeException;
use TYPO3\CMS\Extbase\Error\Result;

final class ValidationFailedException extends RuntimeException
{
    private Result $violations;
    private object $violatingMessage;

    public function __construct(object $violatingMessage, Result $violations)
    {
        $this->violatingMessage = $violatingMessage;
        $this->violations = $violations;

        parent::__construct(sprintf('Message of type "%s" failed validation.', \get_class($this->violatingMessage)));
    }

    public function getViolatingMessage(): object
    {
        return $this->violatingMessage;
    }

    public function getViolations(): Result
    {
        return $this->violations;
    }
}