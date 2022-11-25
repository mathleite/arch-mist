<?php

namespace Mathleite\PhpArch\api\common\responses;

use Mathleite\PhpArch\api\common\interfaces\ControllerResponseInterface;
use Mathleite\PhpArch\api\common\Singleton;

final class JsonResponse implements ControllerResponseInterface
{
    use Singleton;

    private array $data = [];

    private int $statusCode = 200;

    private function setupHeaderResponse()
    {
        header('Content-Type: application/json; charset=utf-8');
    }

    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    public function respond(): string
    {
        $this->setupHeaderResponse();
        http_response_code($this->statusCode);
        return json_encode($this->data);
    }
}