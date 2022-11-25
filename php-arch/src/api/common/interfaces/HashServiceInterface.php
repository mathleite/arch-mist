<?php

namespace Mathleite\PhpArch\api\common\interfaces;

interface HashServiceInterface
{
    public function createHash(string $content): string;

    public function verifyHash(string $content, string $hash): bool;
}