<?php

declare(strict_types=1);

namespace Onisep\IbexaHealthCheckBundle\Check;

use Ibexa\Solr\Gateway\EndpointRegistry;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SolrCheck extends Check implements CheckInterface
{
    public function __construct(private readonly HttpClientInterface $httpClient, private readonly EndpointRegistry $endpointRegistry)
    {
    }

    public function check(): array
    {
        $url = $this->endpointRegistry->getFirstEndpoint()->getURL().'/admin/ping';

        $response = $this->httpClient->request('GET', $url);

        return $this->result(
            'OK' === json_decode($response->getContent())->{'status'},
            ['Qtime' => json_decode($response->getContent())->{'responseHeader'}->{'QTime'}]
        );
    }
}
