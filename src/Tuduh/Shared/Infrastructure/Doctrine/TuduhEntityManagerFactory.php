<?php

declare(strict_types=1);

namespace TechyCode\Tuduh\Shared\Infrastructure\Doctrine;

use TechyCode\Shared\Infrastructure\Doctrine\DoctrineEntityManagerFactory;
use Doctrine\ORM\EntityManagerInterface;

final class TuduhEntityManagerFactory
{
    private const SCHEMA_PATH = __DIR__ . '/../../../../../etc/databases/tuduh.sql';

    public static function create(array $parameters, string $environment): EntityManagerInterface
    {
        $isDevMode = 'prod' !== $environment;

        $prefixes = array_merge(
            DoctrinePrefixesSearcher::inPath(__DIR__ . '/../../../../Tuduh', 'TechyCode\Tuduh'),
//            DoctrinePrefixesSearcher::inPath(__DIR__ . '/../../../../Backoffice', 'TechyCode\Backoffice')
        );

        $dbalCustomTypesClasses = DbalTypesSearcher::inPath(__DIR__ . '/../../../../Tuduh', 'Tuduh');

        return DoctrineEntityManagerFactory::create(
            $parameters,
            $prefixes,
            $isDevMode,
            self::SCHEMA_PATH,
            $dbalCustomTypesClasses
        );
    }
}