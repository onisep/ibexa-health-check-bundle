<?php

namespace Onisep\IbexaHealthCheckBundle\Check;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Contracts\Cache\ItemInterface;

class RedisCheck extends Check implements CheckInterface
{
    public function check(): array
    {
        $cache = new FilesystemAdapter();
        $cacheTest = $cache->get('my_cache_key', function (ItemInterface $item): string {
            $date1 = gettimeofday($as_float = true);
            $item->expiresAfter(1);

            return $date1;
        });
        sleep(1);

        $date2 = gettimeofday($as_float = true);

        return $this->result($cacheTest !== $date2);
    }
}
