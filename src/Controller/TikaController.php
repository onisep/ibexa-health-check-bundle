<?php

namespace Onisep\IbexaHealthCheckBundle\Controller;

use Onisep\IbexaHealthCheckBundle\Check\TikaCheck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class TikaController extends abstractController
{
    public function check(TikaCheck $checker): JsonResponse
    {
        return new JsonResponse($checker->check());
    }
}
