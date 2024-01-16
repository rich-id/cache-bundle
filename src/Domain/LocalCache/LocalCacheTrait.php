<?php

declare(strict_types=1);

namespace RichId\CacheBundle\Domain\LocalCache;

/** @template T */
trait LocalCacheTrait
{
    /** @var array<string, ?T> */
    protected $caches = [];

    public function clearCaches(): void
    {
        $this->caches = [];
    }

    /** @return ?T */
    protected function withCache(string $key, callable $callback)
    {
        if ($this->hasCache($key)) {
            return $this->getCache($key);
        }

        $value = $callback();
        $this->setCache($key, $value);

        return $value;
    }

    /** @param ?T $data */
    protected function setCache(string $key, $data): void
    {
        $this->caches[$key] = $data;
    }

    /** @return ?T */
    protected function getCache(string $key)
    {
        return $this->caches[$key] ?? null;
    }

    protected function hasCache(string $key): bool
    {
        return \array_key_exists($key, $this->caches);
    }
}
