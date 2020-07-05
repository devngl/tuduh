<?php

declare(strict_types=1);

namespace TechyCode\Shared\Domain\Bus\Command;

use RuntimeException;

final class CommandNotRegisteredError extends RuntimeException
{
    public function __construct(Command $command)
    {
        $commandClass = get_class($command);

        parent::__construct("The command <$commandClass> doesn't have a command handler associated");
    }
}
