<?php

namespace Mathleite\PhpArch\route\factory;

use Mathleite\PhpArch\route\enum\RouterEnum;
use Mathleite\PhpArch\route\RouterInterface;
use Mathleite\PhpArch\route\SimpleRouter;

final class RouterFactory
{
    public static function construct(RouterEnum $router): RouterInterface
    {
        return match ($router) {
            RouterEnum::SIMPLE => new SimpleRouter(),
        };
    }
}