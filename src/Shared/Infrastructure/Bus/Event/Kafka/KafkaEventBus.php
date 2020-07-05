<?php

declare(strict_types=1);

namespace TechyCode\Shared\Infrastructure\Bus\Event\Kafka;

use TechyCode\Shared\Domain\Bus\Event\DomainEvent;
use TechyCode\Shared\Domain\Bus\Event\EventBus;

final class KafkaEventBus implements EventBus
{
    private KafkaConnection $connection;

    public function __construct(KafkaConnection $connection)
    {
        $this->connection = $connection;
    }

    public function publish(DomainEvent ...$events): void
    {
        foreach ($events as $event) {
            $this->connection->publish($event);
        }
    }
}