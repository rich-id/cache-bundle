<?php

namespace RichId\CacheBundle\Tests\Resources;

use RichId\CacheBundle\Domain\LocalCache\LocalCacheInterface;
use RichId\CacheBundle\Domain\LocalCache\LocalCacheTrait;

class MyClassWithCacheByTrait implements LocalCacheInterface
{
    /** @use LocalCacheTrait<bool> */
    use LocalCacheTrait;

    public function __invoke(string $key): ?bool
    {
        return $this->withCache(
            $key,
            function () {
                return true;
            }
        );
    }

    /** @param array<string, bool|null> $caches */
    public function setCaches(array $caches): void
    {
        $this->caches = $caches;
    }
}
