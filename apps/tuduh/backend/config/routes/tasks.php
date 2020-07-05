<?php

use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;
use TechyCode\Apps\Tuduh\Backend\Controller\Tasks\TaskPutController;

return static function (RoutingConfigurator $routes) {
    $routes->add('tasks_put', '/tasks/{id}')
        ->controller(TaskPutController::class)
        ->methods(['PUT']);
};
