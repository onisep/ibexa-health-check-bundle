<?php

namespace Onisep\IbexaHealthCheckBundle\Controller;

use Onisep\IbexaHealthCheckBundle\Check\DatabaseCheck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class DatabaseController extends AbstractController
{
    public function check(DatabaseCheck $checker): JsonResponse
    {
        return new JsonResponse($checker->check());
    }
}
