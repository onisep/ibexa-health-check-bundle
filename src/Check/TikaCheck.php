<?php

namespace Onisep\IbexaHealthCheckBundle\Check;

use Vaites\ApacheTika\Clients\WebClient;

class TikaCheck extends Check implements CheckInterface
{
    /** @var WebClient */
    private $tikaClient;

    public function __construct(WebClient $tikaClient)
    {
        $this->tikaClient = $tikaClient;
    }

    public function check(): array
    {
        $documentOutput = $this->tikaClient->request('text', 'https://raw.githubusercontent.com/vaites/php-apache-tika/master/samples/sample7.pdf');

        return $this->result(str_contains($documentOutput, 'pour être utilisable'));
    }
}
