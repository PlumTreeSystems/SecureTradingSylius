<?php

namespace PlumTreeSystems\SyliusSecureTradingPlugin\DependencyInjection;

use PlumTreeSystems\SecureTrading\SecureTradingGatewayFactory;
use PlumTreeSystems\SecureTrading\TestGatewayFactory;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

final class PlumTreeSystemsSyliusSecureTradingExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $config, ContainerBuilder $container): void
    {
        $config = $this->processConfiguration($this->getConfiguration([], $container), $config);
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));

        $container->setParameter('gateway_factory_class',
            $config['test_mode'] ?
                TestGatewayFactory::class : SecureTradingGatewayFactory::class
        );

        $loader->load('services.xml');
    }
}
