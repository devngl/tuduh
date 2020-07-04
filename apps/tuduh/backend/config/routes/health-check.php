<?php

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
use TechyCode\Apps\Tuduh\Backend\Controller\HealthCheck\HealthCheckGetController;

return static function (RoutingConfigurator $routes) {
    $routes->add('health-check_get', 'health-check')
        ->controller(HealthCheckGetController::class)
        ->methods(['GET']);
};
