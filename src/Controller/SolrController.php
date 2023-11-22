<?php

namespace Onisep\IbexaHealthCheckBundle\Controller;

use Onisep\IbexaHealthCheckBundle\Check\SolrCheck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class SolrController extends AbstractController
{
    public function check(SolrCheck $checker): JsonResponse
    {
        return new JsonResponse($checker->check());
    }
}
