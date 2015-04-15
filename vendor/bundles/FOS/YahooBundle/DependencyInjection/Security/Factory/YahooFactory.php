<?php

/*
 * This file is part of the FOSGoogleBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\YahooBundle\DependencyInjection\Security\Factory;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Bundle\SecurityBundle\DependencyInjection\Security\Factory\AbstractFactory;

class YahooFactory extends AbstractFactory
{
    public function __construct()
    {
        $this->addOption('create_user_if_not_exists', false);
    }

    public function getPosition()
    {
        return 'pre_auth';
    }

    public function getKey()
    {
        return 'fos_yahoo';
    }

    protected function getListenerId()
    {
        return 'fos_yahoo.security.authentication.listener';
    }

    protected function createAuthProvider(ContainerBuilder $container, $id, $config, $userProviderId)
    {
        $authProviderId = 'fos_yahoo.auth.'.$id;

        $definition = $container
            ->setDefinition($authProviderId, new DefinitionDecorator('fos_yahoo.auth'))
            ->replaceArgument(0, $id);

        // with user provider
        if (isset($config['provider'])) {
            $definition
                ->addArgument(new Reference($userProviderId))
                ->addArgument(new Reference('security.user_checker'))
                ->addArgument($config['create_user_if_not_exists'])
            ;
        }

        return $authProviderId;
    }

    protected function createEntryPoint($container, $id, $config, $defaultEntryPointId)
    {
        $entryPointId = 'fos_yahoo.security.authentication.entry_point.'.$id;
        $container->setDefinition($entryPointId, new DefinitionDecorator('fos_yahoo.security.authentication.entry_point'));

        // set options to container for use by other classes
        $container->setParameter('fos_yahoo.options.'.$id, $config);

        return $entryPointId;
    }
}
