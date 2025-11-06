<?php

declare(strict_types=1);

namespace Onisep\IbexaHealthCheckBundle\Check;

interface CheckInterface
{
    public function check(): array;
}
