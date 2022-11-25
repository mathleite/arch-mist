<?php

namespace Mathleite\PhpArch\api\common\request;

use Mathleite\PhpArch\api\common\interfaces\RequestInterface;

class Request implements RequestInterface
{
    public function __construct(private readonly array $request) {}

    public function getBody(): array
    {
        return $this->request;
    }
}