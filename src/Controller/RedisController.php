<?php

declare(strict_types=1);

namespace Onisep\IbexaHealthCheckBundle\Controller;

use Onisep\IbexaHealthCheckBundle\Check\RedisCheck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class RedisController extends AbstractController
{
    public function check(RedisCheck $redisCheck): JsonResponse
    {
        return new JsonResponse($redisCheck->check());
    }
}
