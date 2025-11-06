<?php

declare(strict_types=1);

namespace Onisep\IbexaHealthCheckBundle\Check;

use Doctrine\Persistence\ManagerRegistry;

class DatabaseCheck extends Check implements CheckInterface
{
    public function __construct(private readonly ManagerRegistry $managerRegistry)
    {
    }

    public function check(): array
    {
        $result = $this->managerRegistry
            ->getConnection()
            ->executeQuery('SELECT 1 + 1 as result')
            ->fetchOne();

        return $this->result(2 === (int) $result);
    }
}
