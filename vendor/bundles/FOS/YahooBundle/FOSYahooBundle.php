<?php

/*
 * This file is part of the FOSYahooBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\YahooBundle;

use FOS\YahooBundle\DependencyInjection\Security\Factory\YahooFactory;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class FOSYahooBundle extends Bundle
{
  public function build(ContainerBuilder $container)
  {
    parent::build($container);

    $extension = $container->getExtension('security');
    $extension->addSecurityListenerFactory(new YahooFactory());
  }
}