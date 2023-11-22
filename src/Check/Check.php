<?php

namespace Onisep\IbexaHealthCheckBundle\Check;

abstract class Check implements CheckInterface
{
    protected function result(bool $success, array $detail = []): array
    {
        return ['success' => $success, 'detail' => $detail];
    }
}
