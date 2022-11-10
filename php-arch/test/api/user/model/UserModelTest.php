<?php

namespace Mathleite\Test\PhpArch\api\user\model;

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
    }

    public function provideModelAttributes(): iterable
    {
        yield [['name' => 'Matheus', 'lastName' => 22,]];
        yield [['name' => 'Lucas', 'lastName' => 0,]];
        yield [['name' => 'XPTO', 'lastName' => 1, 'some_key' => 'some_value']];
        yield [['lastName' => 22, 'xpto' => 5487]];
        yield [[]];
    }
}
