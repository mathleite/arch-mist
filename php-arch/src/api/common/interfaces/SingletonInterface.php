<?php

namespace Mathleite\PhpArch\api\common\interfaces;

interface SingletonInterface
{
    public static function getInstance(): SingletonInterface;
}