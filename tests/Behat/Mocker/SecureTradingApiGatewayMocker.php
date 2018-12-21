<?php
/**
 * Created by PhpStorm.
 * User: marius
 * Date: 18.12.17
 * Time: 17.13
 */

namespace Tests\PlumTreeSystems\SyliusSecureTradingPlugin\Behat\Mocker;


use Payum\Core\Bridge\Symfony\Builder\GatewayFactoryBuilder;
use PlumTreeSystems\SecureTrading\Connector\SecureTradingConnector;
use PlumTreeSystems\SecureTrading\SecureTradingGatewayFactory;
use Sylius\Behat\Service\Mocker\MockerInterface;

final class SecureTradingApiGatewayMocker
{
    /**
     * @var MockerInterface
     */
    private $mocker;

    /**
     * SecureTradingApiGatewayMocker constructor.
     * @param $mocker
     */
    public function __construct($mocker)
    {
        $this->mocker = $mocker;
    }

    public function confirmMockedOrder(callable $action)
    {
//        $gatewayFactoryBuilder = $this->mocker->mockService('pts_sylius_st_plugin.gateway_factory.plumtreesystems',
//            GatewayFactoryBuilder::class
//        )->makePartial();
//
//        $gatewayFactoryBuilder->shouldReceive('build')->andReturnUsing(function (array $defaultConfig) {
//            $gatewayFactory = \Mockery::mock(SecureTradingGatewayFactory::class, $defaultConfig)->makePartial();
//            $gatewayFactory->shouldReceive('')
//        });
//
//
//        $api = \Mockery::mock(SecureTradingConnector::class);
//        $api->shouldReceive('process');
//
//        $gatewayFactoryMock->shouldReceive('createApi')->andReturn($api);
//
//        $action();
    }
}