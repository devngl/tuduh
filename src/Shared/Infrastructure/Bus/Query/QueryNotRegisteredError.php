<?php

declare(strict_types=1);

namespace TechyCode\Shared\Infrastructure\Bus\Query;

use RuntimeException;
use TechyCode\Shared\Domain\Bus\Query\Query;

final class QueryNotRegisteredError extends RuntimeException
{
    public function __construct(Query $query)
    {
        $queryClass = get_class($query);

        parent::__construct("The query <$queryClass> hasn't a query handler associated.");
    }
}