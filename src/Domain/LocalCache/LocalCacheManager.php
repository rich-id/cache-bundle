<?php

declare(strict_types=1);

namespace RichId\CacheBundle\Domain\LocalCache;

class LocalCacheManager
{
    /** @var LocalCacheInterface[] */
    private array $services = [];

    public function addService(LocalCacheInterface $service): void
    {
        $this->services[] = $service;
    }

    public function clearAllCaches(): void
    {
        foreach ($this->services as $service) {
            $service->clearCaches();
        }
    }
}
