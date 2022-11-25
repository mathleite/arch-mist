<?php

namespace Mathleite\PhpArch\api\common\interfaces;

interface ControllerInterface
{
    public function index(): ControllerResponseInterface;
    public function create(RequestInterface $request): ControllerResponseInterface;
}