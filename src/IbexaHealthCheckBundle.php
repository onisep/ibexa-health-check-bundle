<?php

declare(strict_types=1);

namespace Onisep\IbexaHealthCheckBundle;

use Onisep\IbexaHealthCheckBundle\DependencyInjection\IbexaHealthCheckExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class IbexaHealthCheckBundle extends Bundle
{
    protected $name = 'IbexaHealthCheckBundle';

    protected function getContainerExtensionClass(): string
    {
        return IbexaHealthCheckExtension::class;
    }
}
