<?php

declare(strict_types=1);

namespace RichId\CacheBundle\Domain\LocalCache;

/** @template T */
interface LocalCacheInterface
{
    public function clearCaches(): void;

    /** @param T $data */
    public function setCache(string $key, mixed $data): void;

    /** @return ?T */
    public function getCache(string $key): mixed;

    public function hasCache(string $key): bool;
}
