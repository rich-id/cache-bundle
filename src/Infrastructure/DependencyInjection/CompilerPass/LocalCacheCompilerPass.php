<?php

declare(strict_types=1);

namespace RichId\CacheBundle\Infrastructure\DependencyInjection\CompilerPass;

use RichCongress\BundleToolbox\Configuration\AbstractCompilerPass;
use RichId\CacheBundle\Domain\LocalCache\LocalCacheManager;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

final class LocalCacheCompilerPass extends AbstractCompilerPass
{
    public const TAG = 'local_cache';

    public function process(ContainerBuilder $container): void
    {
        $services = $container->findTaggedServiceIds(self::TAG);
        $definition = $container->findDefinition(LocalCacheManager::class);

        foreach ($services as $serviceId => $tags) {
            $definition->addMethodCall('addService', [new Reference($serviceId)]);
        }
    }
}
