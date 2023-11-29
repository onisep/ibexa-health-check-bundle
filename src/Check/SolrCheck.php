<?php

namespace Onisep\IbexaHealthCheckBundle\Check;

use Ibexa\Solr\Gateway\EndpointRegistry;
use Ibexa\Solr\Gateway\EndpointResolver;
use Ibexa\Solr\Gateway\HttpClient;

class SolrCheck extends Check implements CheckInterface
{
    /** @var HttpClient */
    private $client;

    /** @var EndpointRegistry */
    private $endpointRegistry;

    /** @var EndpointResolver */
    private $endpointResolver;

    public function __construct(HttpClient $client, EndpointRegistry $endpointRegistry, EndpointResolver $endpointResolver)
    {
        $this->client = $client;
        $this->endpointRegistry = $endpointRegistry;
        $this->endpointResolver = $endpointResolver;
    }

    public function check(): array
    {
        $response = $this->client->request(
            'GET',
            $this->endpointRegistry->getEndpoint(
                $this->endpointResolver->getEntryEndpoint()
            ),
            '/admin/ping'
        );

        return $this->result(
            'OK' === json_decode($response->body)->{'status'},
            ['Qtime' => json_decode($response->body)->{'responseHeader'}->{'QTime'}]
        );
    }
}
