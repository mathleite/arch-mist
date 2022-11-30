<?php

namespace Mathleite\PhpArch\api\auth\interfaces;

use Mathleite\PhpArch\api\common\interfaces\ControllerResponseInterface;
use Mathleite\PhpArch\api\common\interfaces\RequestInterface;

interface ControllerInterface extends \Mathleite\PhpArch\api\common\interfaces\ControllerInterface
{
    public function login(RequestInterface $request): ControllerResponseInterface;
    public function create(?RequestInterface $request): ControllerResponseInterface;

}