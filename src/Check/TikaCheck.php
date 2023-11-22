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
        return $this->result(str_contains($this->tikaClient->request('text', 'https://raw.githubusercontent.com/vaites/php-apache-tika/master/samples/sample7.pdf'), 'pour être utilisable'));
    }
}
