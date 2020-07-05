<?php

declare(strict_types=1);

namespace TechyCode\Tuduh\Tasks\Domain;

interface TaskRepository
{
    public function save(Task $task): void;
}