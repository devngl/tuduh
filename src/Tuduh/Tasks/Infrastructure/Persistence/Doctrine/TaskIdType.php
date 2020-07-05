<?php

declare(strict_types=1);

namespace TechyCode\Tuduh\Tasks\Infrastructure\Persistence\Doctrine;

use TechyCode\Tuduh\Shared\Domain\Tasks\TaskId;
use TechyCode\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class TaskIdType extends UuidType
{
    protected function typeClassName(): string
    {
        return TaskId::class;
    }
}