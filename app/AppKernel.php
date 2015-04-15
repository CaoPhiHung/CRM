<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new JMS\AopBundle\JMSAopBundle(),
            new JMS\DiExtraBundle\JMSDiExtraBundle($this),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),
            new Doctrine\Bundle\MongoDBBundle\DoctrineMongoDBBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new FOS\GoogleBundle\FOSGoogleBundle(),
            new FOS\FacebookBundle\FOSFacebookBundle(),
            new Vietland\UserBundle\VietlandUserBundle(),
            new Vietland\AevitasBundle\VietlandAevitasBundle(),
            new Aevitas\ChannelBundle\AevitasChannelBundle(),
            new Aevitas\PointBundle\AevitasPointBundle(),
            new Aevitas\LevisBundle\AevitasLevisBundle(),
            new Vietland\StoreBundle\VietlandStoreBundle(),
            new Aevitas\ConfigBundle\AevitasConfigBundle(),
            new Realestate\MssqlBundle\RealestateMssqlBundle(),
            new Vietland\ElfinderBundle\VietlandElfinderBundle(),
            new Aevitas\CustomerCodeBundle\AevitasCustomerCodeBundle(),
            new Liuggio\ExcelBundle\LiuggioExcelBundle()
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Acme\DemoBundle\AcmeDemoBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
