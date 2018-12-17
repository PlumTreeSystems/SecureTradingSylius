<?php
/**
 * Created by PhpStorm.
 * User: marius
 * Date: 18.12.17
 * Time: 17.13
 */

namespace Tests\PlumTreeSystems\SyliusSecureTradingPlugin\Behat\Mocker;


use Sylius\Behat\Service\Mocker\MockerInterface;

final class SecureTradingApiMocker
{
    /**
     * @var MockerInterface
     */
    private $mocker;
    /**
     * @param MockerInterface $mocker
     */
    public function __construct(MockerInterface $mocker)
    {
        $this->mocker = $mocker;
    }
    /**
     * @param callable $action
     */
    public function mockApiCreatePayment(callable $action): void
    {
        $payment = \Mockery::mock('payment', Payment::class);
        $payment->id = 1;
        $payment
            ->shouldReceive('getCheckoutUrl')
            ->andReturn('')
        ;
        $payments = \Mockery::mock('payments');
        $payments
            ->shouldReceive('create')
            ->andReturn($payment)
        ;
        $mock = $this->mocker->mockService('bitbag_sylius_mollie_plugin.mollie_api_client', MollieApiClient::class);
        $mock
            ->shouldReceive('setApiKey')
        ;
        $mock
            ->shouldReceive('isRecurringSubscription')
            ->andReturn(false)
        ;
        $mock
            ->shouldReceive('isRefunded')
            ->andReturn(false)
        ;
        $mock->payments = $payments;
        $action();
        $this->mocker->unmockAll();
    }
    /**
     * @param callable $action
     */
    public function mockApiSuccessfulPayment(callable $action): void
    {
        $payment = \Mockery::mock('payment', Payment::class);
        $payment->metadata = (object) [
            'order_id' => 1,
        ];
        $payment->status = PaymentStatus::STATUS_PAID;
        $payments = \Mockery::mock('payments');
        $payments
            ->shouldReceive('get')
            ->andReturn($payment)
        ;
        $mock = $this->mocker->mockService('bitbag_sylius_mollie_plugin.mollie_api_client', MollieApiClient::class);
        $mock
            ->shouldReceive('setApiKey')
        ;
        $mock
            ->shouldReceive('isRecurringSubscription')
            ->andReturn(false)
        ;
        $mock
            ->shouldReceive('isRefunded')
            ->andReturn(false)
        ;
        $mock->payments = $payments;
        $action();
        $this->mocker->unmockAll();
    }
}