<?php

namespace Onisep\IbexaHealthCheckBundle\Controller;

use Onisep\IbexaHealthCheckBundle\Check\RedisCheck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class RedisController extends AbstractController
{
    public function check(RedisCheck $checker): JsonResponse
    {
        return new JsonResponse($checker->check());
    }
}
