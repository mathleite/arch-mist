<?php

namespace Mathleite\PhpArch\database\memory\exceptions;

class SessionNotStartedException extends \Exception
{
    public function __construct()
    {
        parent::__construct('Session not started!', 500);
    }
}