<?php

declare(strict_types=1);

namespace Onisep\IbexaHealthCheckBundle\Check;

abstract class Check implements CheckInterface
{
    protected function result(bool $success, array $detail = []): array
    {
        return ['success' => $success, 'detail' => $detail];
    }
}
