<?php
/**
 * Copyright © 2017 Divante, Inc. All rights reserved.
 * See LICENSE for license details.
 */

namespace Divante\Bundle\ElasticsearchBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 */
class Configuration implements ConfigurationInterface
{
    /**
     *
     */
    const DEFAULT_INDEX_SETTINGS = [
        "index.mapping.total_fields.limit" => 5000
    ];

    /**
     * {@inheritdoc]
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('divante_elasticsearch');

        $rootNode->children()
            ->scalarNode('index')
                ->cannotBeEmpty()
                ->defaultValue('oro')
            ->end()
            ->scalarNode('type')
                ->cannotBeEmpty()
                ->defaultValue('oro_product_1')
            ->end()
            ->arrayNode("index_settings")
                ->prototype('scalar')->end()
                ->defaultValue(static::DEFAULT_INDEX_SETTINGS)
            ->end();

        return $treeBuilder;
    }
}
