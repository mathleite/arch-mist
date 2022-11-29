<?php

namespace Mathleite\Test\PhpArch\api\user\model;

use Mathleite\PhpArch\api\common\models\exceptions\InvalidEmailException;
use Mathleite\PhpArch\api\user\model\UserModel;
use PHPUnit\Framework\TestCase;

class UserModelTest extends TestCase
{
    /** @dataProvider provideModelAttributes */
    public function test_ShouldFillModelAttributes(array $properties)
    {
        $model = new UserModel($properties);

        $this->assertEquals($properties['name'] ?? null, $model->getName());
        $this->assertEquals($properties['lastName'] ?? null, $model->getLastName());
        $this->assertEquals($properties['email'] ?? null, $model->getEmail()?->getAddress());

        if (array_key_exists('password', $properties)) {
            $this->assertArrayNotHasKey('password', $model->toArray());
            $this->assertFalse($properties['password'] === $model->getPasswordHash());
        }
    }

    /** @dataProvider provideInvalidEmails */
    public function test_ShouldThrowEmailException_WhenGivenInvalidEmails(array $properties)
    {
        $this->expectException(InvalidEmailException::class);
        $user = new UserModel($properties);
    }

    public function provideModelAttributes(): iterable
    {
        yield [['name' => 'Matheus', 'lastName' => 22,]];
        yield [['name' => 'Lucas', 'lastName' => 0,]];
        yield [['name' => 'XPTO', 'lastName' => 1, 'some_key' => 'some_value']];
        yield [['lastName' => 22, 'xpto' => 5487]];
        yield [['lastName' => 22, 'password' => 'xpto']];
        yield [['lastName' => 22, 'email' => 'xpto@example.com']];
        yield [[]];
    }

    public function provideInvalidEmails(): iterable
    {
        yield [['email' => '123']];
        yield [['email' => 'null']];
        yield [['email' => 'ajhsduash@hda q8e8']];
        yield [['email' => '123@123']];
        yield [['email' => 'email@23']];
        yield [['email' => 'some-email-here@email']];
    }
}
