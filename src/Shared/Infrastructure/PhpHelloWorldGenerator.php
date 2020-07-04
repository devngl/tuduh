<?php

namespace TechyCode\Shared\Infrastructure;

use TechyCode\Shared\Domain\HelloWorldGenerator;

class PhpHelloWorldGenerator implements HelloWorldGenerator
{
    public function sayHello(): string
    {
        return 'Hello World!';
    }
}