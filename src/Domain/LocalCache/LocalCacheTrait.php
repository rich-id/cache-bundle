<?php

declare(strict_types=1);

namespace RichId\CacheBundle\Domain\LocalCache;

/** @template T */
trait LocalCacheTrait
{
    /** @var array<string, ?T> */
    protected array $caches = [];

    public function clearCaches(): void
    {
        $this->caches = [];
    }

    /** @param T $data */
    public function setCache(string $key, mixed $data): void
    {
        $this->caches[$key] = $data;
    }

    /** @return ?T */
    public function getCache(string $key): mixed
    {
        return $this->caches[$key] ?? null;
    }

    public function hasCache(string $key): bool
    {
        return isset($this->caches[$key]);
    }

    /** @return ?T */
    public function withCache(string $key, callable $callback): mixed
    {
        if ($this->hasCache($key)) {
            return $this->getCache($key);
        }

        $value = $callback();
        $this->setCache($key, $value);

        return $value;
    }
}
