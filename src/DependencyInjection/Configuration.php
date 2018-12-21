<?php

namespace PlumTreeSystems\SyliusSecureTradingPlugin\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

final class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('plum_tree_systems_sylius_secure_trading');

        $rootNode
            ->children()
                ->booleanNode('test_mode')
                    ->defaultValue(false)
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
