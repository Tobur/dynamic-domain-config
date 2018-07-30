<?php

namespace DynamicDomainConfig\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('dynamic_domain_config');
        $rootNode
            ->children()
                ->variableNode('domain_mapping')
                ->end()
                ->arrayNode('doctrine_connection')
                    ->children()
                        ->scalarNode('dbname')
                        ->cannotBeEmpty()
                        ->end()
                        ->scalarNode('host')
                        ->cannotBeEmpty()
                        ->end()
                        ->scalarNode('port')
                        ->cannotBeEmpty()
                        ->end()
                        ->scalarNode('user')
                        ->cannotBeEmpty()
                        ->end()
                        ->scalarNode('password')
                        ->cannotBeEmpty()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
