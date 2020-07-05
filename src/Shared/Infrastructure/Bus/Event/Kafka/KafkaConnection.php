<?php

declare(strict_types=1);

namespace TechyCode\Shared\Infrastructure\Bus\Event\Kafka;

use Enqueue\RdKafka\RdKafkaConnectionFactory;
use Enqueue\RdKafka\RdKafkaContext;
use TechyCode\Shared\Domain\Bus\Event\DomainEvent;

final class KafkaConnection
{
    private RdKafkaContext $context;

    public function __construct(array $configuration)
    {
        $connectionFactory = new RdKafkaConnectionFactory([
            'global'       => [
                'metadata.broker.list' => sprintf("%s:%s", $configuration['host'], $configuration['port']),
                'message.max.bytes'    => '1000000000',
                'group.id'             => $configuration['group_id']
            ],
            'topic'        => [],
            'commit_async' => false,
        ]);

        $this->context = $connectionFactory->createContext();
    }

    public function publish(DomainEvent $event): void
    {
        $topic = $this->context->createTopic($event::eventName());
        $message = $this->context->createMessage(json_encode($event->toPrimitives(), JSON_THROW_ON_ERROR));

        $this->context->createProducer()->send($topic, $message);
        $this->context->close();
    }
}