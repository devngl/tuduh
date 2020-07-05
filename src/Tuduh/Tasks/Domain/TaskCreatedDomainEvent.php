<?php

declare(strict_types=1);

namespace TechyCode\Tuduh\Tasks\Domain;

use TechyCode\Shared\Domain\Bus\Event\DomainEvent;

class TaskCreatedDomainEvent extends DomainEvent
{
    private string $description;

    public function __construct(string $id, string $description, ?string $eventId = null, ?string $occurredOn = null)
    {
        parent::__construct($id, $eventId, $occurredOn);

        $this->description = $description;
    }

    public static function fromPrimitives(string $aggregateId,
                                          array $body,
                                          string $eventId,
                                          string $occurredOn): DomainEvent
    {
        return new self($aggregateId, $body['description'], $eventId, $occurredOn);
    }

    public static function eventName(): string
    {
        return 'task.created';
    }

    public function toPrimitives(): array
    {
        return [
            'description' => $this->description,
        ];
    }

    public function description(): string
    {
        return $this->description;
    }
}
