<?php

namespace RichId\CacheBundle\Tests\Resources;

use RichId\CacheBundle\Domain\LocalCache\LocalCacheInterface;

class MyClassWithCache implements LocalCacheInterface
{
    /** @var array<string, ?bool> */
    protected $caches = [];

    public function __invoke(string $key): bool
    {
        if (isset($this->caches[$key])) {
            return $this->caches[$key];
        }

        $this->caches[$key] = true;
        return true;
    }

    /** @param array<string, ?bool> $caches */
    public function setCaches(array $caches): void
    {
        $this->caches = $caches;
    }

    public function clearCaches(): void
    {
        $this->caches = [];
    }
}
