<?php


namespace YBaltus\RecaptchaBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('recaptcha');
        $treeBuilder->getRootNode()
            ->children()
            ->scalarNode('siteKey')->isRequired()->cannotBeEmpty()->end()
            ->scalarNode('secretKey')->isRequired()->end()
            ->end()
        ;

        return $treeBuilder;
    }
}