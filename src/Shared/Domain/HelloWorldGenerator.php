<?php

declare(strict_types=1);

namespace TechyCode\Shared\Domain;

interface HelloWorldGenerator {
    public function sayHello(): string;
}