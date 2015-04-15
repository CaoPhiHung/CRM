<?php

/*
 * This file is part of the FOSYahooBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\YahooBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder,
    Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This class contains the configuration information for the bundle
 *
 * This information is solely responsible for how the different configuration
 * sections are normalized, and merged.
 *
 * @author Lukas Kahwe Smith <smith@pooteeweet.org>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('fos_yahoo');

        $rootNode
            ->fixXmlConfig('permission', 'permissions')
            ->children()
                ->scalarNode('client_id')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('client_secret')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('redirect_uri')->isRequired()->cannotBeEmpty()->end()
                ->arrayNode('class')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('api')->defaultValue('FOS\YahooBundle\Yahoo\YahooSessionPersistence')->end()
                        ->scalarNode('helper')->defaultValue('FOS\YahooBundle\Templating\Helper\YahooHelper')->end()
                        ->scalarNode('twig')->defaultValue('FOS\YahooBundle\Twig\Extension\YahooExtension')->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
