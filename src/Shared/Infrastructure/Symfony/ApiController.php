<?php

declare(strict_types=1);

namespace TechyCode\Shared\Infrastructure\Symfony;

use TechyCode\Shared\Domain\Bus\Command\Command;
use TechyCode\Shared\Domain\Bus\Command\CommandBus;
use TechyCode\Shared\Domain\Bus\Query\Query;
use TechyCode\Shared\Domain\Bus\Query\QueryBus;
use TechyCode\Shared\Domain\Bus\Query\Response;

abstract class ApiController
{
    private QueryBus $queryBus;
    private CommandBus $commandBus;

    public function __construct(QueryBus $queryBus, CommandBus $commandBus)
    {
        $this->queryBus = $queryBus;
        $this->commandBus = $commandBus;
    }

    abstract protected function exceptions(): array;

    protected function ask(Query $query): ?Response
    {
        return $this->queryBus->ask($query);
    }

    public function dispatch(Command $command): void
    {
        $this->commandBus->dispatch($command);
    }
}
