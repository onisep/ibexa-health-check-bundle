<?php

namespace Onisep\IbexaHealthCheckBundle\Check;

use Doctrine\Persistence\ManagerRegistry;

class DatabaseCheck extends Check implements CheckInterface
{
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function check(): array
    {
        $result = $this->doctrine
            ->getConnection()
            ->executeQuery('SELECT 1 + 1 as result')
            ->fetchOne();

        return $this->result(2 === (int) $result);
    }
}
