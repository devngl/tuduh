<?php

declare(strict_types=1);

namespace TechyCode\Apps\Tuduh\Backend\Controller\Tasks;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use TechyCode\Shared\Infrastructure\Symfony\ApiController;
use TechyCode\Tuduh\Tasks\Application\Create\CreateTaskCommand;

class TaskPutController extends ApiController
{
    public function __invoke(string $id, Request $request): Response
    {
        $this->dispatch(new CreateTaskCommand($id, $request->request->get('description')));

        return new Response('', Response::HTTP_CREATED);
    }

    protected function exceptions(): array
    {
        return [];
    }
}
