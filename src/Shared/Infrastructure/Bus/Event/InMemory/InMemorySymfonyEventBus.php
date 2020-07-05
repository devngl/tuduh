<?php

declare(strict_types=1);

namespace TechyCode\Shared\Infrastructure\Bus\Event\InMemory;

use Symfony\Component\Messenger\Exception\NoHandlerForMessageException;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;
use TechyCode\Shared\Domain\Bus\Event\DomainEvent;
use TechyCode\Shared\Domain\Bus\Event\EventBus;
use TechyCode\Shared\Infrastructure\Bus\CallableFirstParameterExtractor;

class InMemorySymfonyEventBus implements EventBus
{
    private MessageBus $bus;

    public function __construct(iterable $subscribers)
    {
        $this->bus = new MessageBus([
            new HandleMessageMiddleware(
                new HandlersLocator(
                    CallableFirstParameterExtractor::forPipedCallables($subscribers)
                )
            ),
        ]);
    }

    public function publish(DomainEvent ...$events): void
    {
        foreach ($events as $event) {
            try {
                $this->bus->dispatch($event);
            } catch (NoHandlerForMessageException $error) {}
        }
    }
}