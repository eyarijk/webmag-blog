<?php

namespace App\Mr\NewsApiBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('news_api');

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('api_key')->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
