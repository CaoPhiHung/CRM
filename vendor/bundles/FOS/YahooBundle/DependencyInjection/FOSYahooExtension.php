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

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;

class FOSYahooExtension extends Extension
{
    protected $resources = array(
        'yahoo' => 'yahoo.xml',
        'security' => 'security.xml'
    );

    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration();
        $config = $processor->processConfiguration($configuration, $configs);

        $this->loadDefaults($container);

        if (isset($config['alias'])) {
            $container->setAlias($config['alias'], 'fos_yahoo.api');
        }

        foreach (array('api', 'helper', 'twig') as $attribute) {
            $container->setParameter('fos_yahoo.'.$attribute.'.class', $config['class'][$attribute]);
        }

        foreach (array('client_id', 'client_secret', 'redirect_uri') as $attribute) {
            $container->setParameter('fos_yahoo.'.$attribute, $config[$attribute]);
        }
    }

    /**
     * @codeCoverageIgnore
     */
    public function getXsdValidationBasePath()
    {
        return __DIR__ . '/../Resources/config/schema';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getNamespace()
    {
        return 'http://symfony.com/schema/dic/fos_yahoo';
    }

    /**
     * @codeCoverageIgnore
     */
    protected function loadDefaults($container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        foreach ($this->resources as $resource) {
            $loader->load($resource);
        }
    }
}
