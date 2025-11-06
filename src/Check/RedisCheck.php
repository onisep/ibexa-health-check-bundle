<?php

declare(strict_types=1);

namespace Onisep\IbexaHealthCheckBundle\Check;

use Ibexa\Core\Persistence\Cache\Adapter\TransactionalInMemoryCacheAdapter;

class RedisCheck extends Check implements CheckInterface
{
    public function __construct(private readonly TransactionalInMemoryCacheAdapter $cache)
    {
    }

    public function check(): array
    {
        $value = gettimeofday(true);
        $item = $this->cache->getItem('my_cache_key');
        $item
            ->set($value)
            ->expiresAfter(1)
        ;
        $this->cache->save($item);

        usleep(1001000);

        return $this->result($this->cache->getItem('my_cache_key')->get() !== $value);
    }
}
