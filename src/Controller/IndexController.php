<?php

declare(strict_types=1);

namespace Onisep\IbexaHealthCheckBundle\Controller;

use Onisep\IbexaHealthCheckBundle\Check\DatabaseCheck;
use Onisep\IbexaHealthCheckBundle\Check\RedisCheck;
use Onisep\IbexaHealthCheckBundle\Check\SolrCheck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class IndexController extends AbstractController
{
    public function check(RedisCheck $redisCheck, DatabaseCheck $databaseCheck, SolrCheck $solrCheck): JsonResponse
    {
        return new JsonResponse([
            'redis' => $redisCheck->check(),
            'database' => $databaseCheck->check(),
            'solr' => $solrCheck->check(),
        ]);
    }
}
