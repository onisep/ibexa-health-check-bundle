<?php

namespace Onisep\IbexaHealthCheckBundle\Controller;

use Onisep\IbexaHealthCheckBundle\Check\DatabaseCheck;
use Onisep\IbexaHealthCheckBundle\Check\RedisCheck;
use Onisep\IbexaHealthCheckBundle\Check\SolrCheck;
use Onisep\IbexaHealthCheckBundle\Check\TikaCheck;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class IndexController extends AbstractController
{
    public function check(RedisCheck $redisChecker, DatabaseCheck $databaseChecker, SolrCheck $solrChecker, TikaCheck $tikaChecker): JsonResponse
    {
        return new JsonResponse(
            [
                'redis' => $redisChecker->check(),
                'database' => $databaseChecker->check(),
                'solr' => $solrChecker->check(),
                'tika' => $tikaChecker->check(),
            ]);
    }
}
