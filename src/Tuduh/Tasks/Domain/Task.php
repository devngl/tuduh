<?php

declare(strict_types=1);

namespace TechyCode\Tuduh\Tasks\Domain;

use TechyCode\Shared\Domain\Aggregate\AggregateRoot;
use TechyCode\Tuduh\Shared\Domain\Tasks\TaskId;

final class Task extends AggregateRoot
{
    private TaskId $id;
    private TaskDescription $description;

    public function __construct(TaskId $id, TaskDescription $description)
    {
        $this->id = $id;
        $this->description = $description;
    }

    public static function create(TaskId $id, TaskDescription $description): self
    {
        $task = new self($id, $description);

        $task->record(new TaskCreatedDomainEvent($id->value(), $description->value()));

        return $task;
    }

    public function id(): TaskId
    {
        return $this->id;
    }

    public function description(): TaskDescription
    {
        return $this->description;
    }
}
