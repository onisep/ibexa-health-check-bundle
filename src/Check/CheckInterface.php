<?php

namespace Onisep\IbexaHealthCheckBundle\Check;

interface CheckInterface
{
    public function check(): array;
}
