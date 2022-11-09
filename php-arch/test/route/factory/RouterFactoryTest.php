<?php

namespace Mathleite\Test\PhpArch\route\factory;

use Mathleite\PhpArch\route\enum\RouterEnum;
use Mathleite\PhpArch\route\factory\RouterFactory;
use Mathleite\PhpArch\route\RouterInterface;
use PHPUnit\Framework\TestCase;

class RouterFactoryTest extends TestCase
{
    public function test_ShouldConstructRouter(): void
    {
        $router = RouterFactory::construct(RouterEnum::SIMPLE);
        $this->assertInstanceOf(RouterInterface::class, $router);
    }
}
