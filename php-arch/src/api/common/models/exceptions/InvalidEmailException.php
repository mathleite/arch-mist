<?php

namespace Mathleite\PhpArch\api\common\models\exceptions;

class InvalidEmailException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Invalid email format!', 500);
    }
}