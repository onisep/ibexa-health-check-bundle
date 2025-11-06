<?php

declare(strict_types=1);

namespace Onisep\IbexaHealthCheckBundle\Controller;

use Onisep\IbexaHealthCheckBundle\Check\DatabaseCheck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class DatabaseController extends AbstractController
{
    public function check(DatabaseCheck $databaseCheck): JsonResponse
    {
        return new JsonResponse($databaseCheck->check());
    }
}
