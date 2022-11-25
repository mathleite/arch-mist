<?php

namespace Mathleite\PhpArch\api\common\services;

use Mathleite\PhpArch\api\common\interfaces\HashServiceInterface;

class PasswordService implements HashServiceInterface
{
    private const PASSWORD_LEVEL_CONFIG = 'PASSWORD_LEVEL';
    private readonly string $algorithm;

    public function __construct()
    {
        $this->algorithm = $this->getPasswordAlgorithmByPasswordLevel();
    }

    public function createHash(string $content): string
    {
        return password_hash($content, $this->algorithm);
    }

    public function verifyHash(string $content, string $hash): bool
    {
        return password_verify($content, $hash);
    }

    private function getPasswordAlgorithmByPasswordLevel(): string
    {
        $defaultAlgorithm = 'PASSWORD_ARGON2ID';
        if (!$passwordLevel = getenv(self::PASSWORD_LEVEL_CONFIG)) {
            return $defaultAlgorithm;
        }

        return match (strtolower($passwordLevel)) {
            'low' => 'PASSWORD_DEFAULT',
            'medium' => 'PASSWORD_BCRYPT',
            'high' => 'PASSWORD_ARGON2ID',
            default => $defaultAlgorithm
        };
    }
}