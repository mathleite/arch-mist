<?php

namespace Mathleite\Test\PhpArch\api\common\services;

use Mathleite\PhpArch\api\common\services\PasswordService;
use Mathleite\PhpArch\api\user\model\UserModel;
use PHPUnit\Framework\TestCase;

class PasswordServiceTest extends TestCase
{
    /** @dataProvider provideStringsToHash */
    public function test_HashCreation_ShouldReturnDifferentHashes(string $stringToHash)
    {
        $service = new PasswordService();
        $hashPassword = $service->createHash($stringToHash);

        $this->assertTrue($stringToHash !== $hashPassword);
        $this->assertTrue($service->verifyHash($stringToHash, $hashPassword));
    }

    public function provideStringsToHash(): iterable
    {
        yield '1' => ['fooBar'];
        yield '2' => ['null'];
        yield '3' => ['103131'];
        yield '4' => ['!@#*!&#&T!BBGF548451'];
        yield '5' => [' '];
    }
}
