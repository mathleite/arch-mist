<?php

namespace Mathleite\PhpArch\api\common\interfaces;

interface AuthenticateInterface
{
    public function getPasswordHash(): ?string;
}