<?php

declare(strict_types=1);

namespace RichId\CacheBundle\Infrastructure\DependencyInjection;

use RichCongress\BundleToolbox\Configuration\AbstractConfiguration;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

class Configuration extends AbstractConfiguration
{
    public const CONFIG_NODE = 'rich_id_cache';

    protected function buildConfiguration(ArrayNodeDefinition $rootNode): void
    {
    }
}
