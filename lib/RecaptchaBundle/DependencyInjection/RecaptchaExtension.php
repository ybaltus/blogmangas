<?php


namespace YBaltus\RecaptchaBundle\DependencyInjection;


use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

class RecaptchaExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new YamlFileLoader(
            $container,
            new FileLocator(__DIR__.'/../Resources/config')
        );
        $loader->load('services.yaml');
        $configuration = $this->getConfiguration($configs, $container);
    }

    public function getConfiguration(array $config, ContainerBuilder $container)
    {
        $configuration= new Configuration();
        $config = $this->processConfiguration($configuration, $config);
        $container->setParameter('recaptcha.siteKey', $config['siteKey']);
        $container->setParameter('recaptcha.secretKey', $config['secretKey']);
        return $configuration;

    }
}