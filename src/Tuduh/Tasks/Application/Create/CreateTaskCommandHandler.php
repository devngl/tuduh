<?php

declare(strict_types=1);

namespace TechyCode\Tuduh\Tasks\Application\Create;

use TechyCode\Shared\Domain\Bus\Command\CommandHandler;
use TechyCode\Tuduh\Shared\Domain\Tasks\TaskId;
use TechyCode\Tuduh\Tasks\Domain\TaskDescription;

final class CreateTaskCommandHandler implements CommandHandler
{
    private TaskCreator $creator;

    public function __construct(TaskCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(CreateTaskCommand $command) :void
    {
        $id = new TaskId($command->id());
        $description = new TaskDescription($command->description());

        $this->creator->__invoke($id, $description);
    }
}