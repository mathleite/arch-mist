<?php

namespace Mathleite\PhpArch\api\common\models;

use Mathleite\PhpArch\api\common\models\exceptions\InvalidEmailException;

class Email
{
    private readonly string $email;
    public function __construct(string $subject)
    {
        $this->validateEmail($subject);
        $this->email = $subject;
    }

    private function validateEmail(string $subject): void
    {
        if (!filter_var($subject, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException();
        }
    }

    public function getAddress(): string
    {
        return $this->email;
    }
}