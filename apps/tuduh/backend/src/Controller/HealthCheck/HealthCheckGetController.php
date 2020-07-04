<?php

declare(strict_types=1);

namespace TechyCode\Apps\Tuduh\Backend\Controller\HealthCheck;

use Symfony\Component\HttpFoundation\JsonResponse;
use TechyCode\Shared\Domain\HelloWorldGenerator;

final class HealthCheckGetController
{
    private HelloWorldGenerator $helloWorldGenerator;

    public function __construct(HelloWorldGenerator $helloWorldGenerator)
    {
        $this->helloWorldGenerator = $helloWorldGenerator;
    }

    public function __invoke()
    {
        return new JsonResponse([
            'tuduh-web-backend' => 'ok',
            'service-wiring'    => $this->helloWorldGenerator->sayHello(),
        ]);
    }
}