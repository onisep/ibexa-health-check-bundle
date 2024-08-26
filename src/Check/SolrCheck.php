<?php

namespace Onisep\IbexaHealthCheckBundle\Check;

use Ibexa\Solr\Gateway\EndpointRegistry;
use Ibexa\Solr\Gateway\EndpointResolver;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SolrCheck extends Check implements CheckInterface
{
    /** @var HttpClientInterface */
    private $client;

    /** @var EndpointRegistry */
    private $endpointRegistry;

    /** @var EndpointResolver */
    private $endpointResolver;

    public function __construct(HttpClientInterface $client, EndpointRegistry $endpointRegistry, EndpointResolver $endpointResolver)
    {
        $this->client = $client;
        $this->endpointRegistry = $endpointRegistry;
        $this->endpointResolver = $endpointResolver;
    }

    public function check(): array
    {
        $url = $this->endpointRegistry->getEndpoint($this->endpointResolver->getEntryEndpoint())->getURL() . '/admin/ping';

        $response = $this->client->request('GET', $url);

        return $this->result(
            'OK' === json_decode($response->getContent())->{'status'},
            ['Qtime' => json_decode($response->getContent())->{'responseHeader'}->{'QTime'}]
        );
    }
}
