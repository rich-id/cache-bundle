<?php

namespace RichId\CacheBundle\Tests;

use RichCongress\TestFramework\TestConfiguration\Annotation\TestConfig;
use RichCongress\TestSuite\TestCase\TestCase;
use RichId\CacheBundle\Domain\LocalCache\LocalCacheManager;
use RichId\CacheBundle\Tests\Resources\MyClassWithCache;
use RichId\CacheBundle\Tests\Resources\MyClassWithCacheByTrait;

/**
 * @covers \RichId\CacheBundle\Domain\LocalCache\LocalCacheManager
 * @covers \RichId\CacheBundle\Domain\LocalCache\LocalCacheTrait
 * @TestConfig("container")
 */
final class LocalCacheTest extends TestCase
{
    /** @var LocalCacheManager */
    public $localCacheManager;

    /** @var MyClassWithCache */
    public $myClassWithCache;

    /** @var MyClassWithCacheByTrait */
    public $myClassWithCacheByTrait;

    public function testLocalCacheWithInterface(): void
    {
        self::assertTrue(($this->myClassWithCache)('test1'));
        self::assertTrue(($this->myClassWithCache)('test1'));
        $this->myClassWithCache->setCaches(['test1' => false]);
        self::assertFalse(($this->myClassWithCache)('test1'));

        self::assertTrue(($this->myClassWithCache)('test2'));
        self::assertTrue(($this->myClassWithCache)('test2'));
        $this->myClassWithCache->setCaches(['test2' => false]);
        self::assertFalse(($this->myClassWithCache)('test2'));

        $this->localCacheManager->clearAllCaches();

        self::assertTrue(($this->myClassWithCache)('test1'));
        self::assertTrue(($this->myClassWithCache)('test2'));
    }

    public function testLocalCacheWithTrait(): void
    {
        self::assertTrue(($this->myClassWithCacheByTrait)('test1'));
        self::assertTrue(($this->myClassWithCacheByTrait)('test1'));
        $this->myClassWithCacheByTrait->setCaches(['test1' => false]);
        self::assertFalse(($this->myClassWithCacheByTrait)('test1'));
        $this->myClassWithCacheByTrait->setCaches(['test1' => null]);
        self::assertNull(($this->myClassWithCacheByTrait)('test1'));

        self::assertTrue(($this->myClassWithCacheByTrait)('test2'));
        self::assertTrue(($this->myClassWithCacheByTrait)('test2'));
        $this->myClassWithCacheByTrait->setCaches(['test2' => false]);
        self::assertFalse(($this->myClassWithCacheByTrait)('test2'));
        $this->myClassWithCacheByTrait->setCaches(['test2' => null]);
        self::assertNull(($this->myClassWithCacheByTrait)('test2'));

        $this->localCacheManager->clearAllCaches();

        self::assertTrue(($this->myClassWithCacheByTrait)('test1'));
        self::assertTrue(($this->myClassWithCacheByTrait)('test2'));
    }
}
