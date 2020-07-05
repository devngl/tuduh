<?php

declare(strict_types=1);

namespace TechyCode\Tuduh\Tasks\Infrastructure\Persistence;

use TechyCode\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;
use TechyCode\Tuduh\Tasks\Domain\Task;
use TechyCode\Tuduh\Tasks\Domain\TaskRepository;

final class DoctrineTaskRepository extends DoctrineRepository implements TaskRepository
{
    public function save(Task $task): void
    {
        $this->persist($task);
    }
}
