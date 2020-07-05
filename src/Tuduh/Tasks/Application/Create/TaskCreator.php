<?php

declare(strict_types=1);

namespace TechyCode\Tuduh\Tasks\Application\Create;

use TechyCode\Shared\Domain\Bus\Event\EventBus;
use TechyCode\Tuduh\Shared\Domain\Tasks\TaskId;
use TechyCode\Tuduh\Tasks\Domain\Task;
use TechyCode\Tuduh\Tasks\Domain\TaskDescription;
use TechyCode\Tuduh\Tasks\Domain\TaskRepository;

final class TaskCreator
{
    private TaskRepository $repository;
    private EventBus $bus;

    public function __construct(TaskRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->bus = $bus;
    }

    public function __invoke(TaskId $id, TaskDescription $description): void
    {
        $task = Task::create($id, $description);

        $this->repository->save($task);
        $this->bus->publish(...$task->pullDomainEvents());
    }
}