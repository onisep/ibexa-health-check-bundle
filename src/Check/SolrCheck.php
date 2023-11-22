<?php

namespace Onisep\IbexaHealthCheckBundle\Check;

use EzSystems\EzPlatformSolrSearchEngine\Gateway\EndpointRegistry;
use EzSystems\EzPlatformSolrSearchEngine\Gateway\EndpointResolver;
use EzSystems\EzPlatformSolrSearchEngine\Gateway\HttpClient;

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

        return [
            'success' => 'OK' === json_decode($response->body)->{'status'},
            'detail' => ['Qtime' => json_decode($response->body)->{'responseHeader'}->{'QTime'}],
        ];
    }
}
