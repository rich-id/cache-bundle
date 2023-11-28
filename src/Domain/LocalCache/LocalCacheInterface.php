<?php

declare(strict_types=1);

namespace RichId\CacheBundle\Domain\LocalCache;

interface LocalCacheInterface
{
    public function clearCaches(): void;
}
