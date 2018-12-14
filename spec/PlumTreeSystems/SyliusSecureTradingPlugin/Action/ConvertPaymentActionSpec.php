<?php

namespace spec\PlumTreeSystems\SyliusSecureTradingPlugin\Action;

use Payum\Core\Action\ActionInterface;
use Payum\Core\Request\Convert;
use PhpSpec\ObjectBehavior;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Model\PaymentInterface;

class ConvertPaymentActionSpec extends ObjectBehavior
{

    function it_implements_action_interface(): void
    {
        $this->shouldHaveType(ActionInterface::class);
    }

    function it_executes(
        Convert $request,
        PaymentInterface $payment,
        OrderInterface $order
    ): void {
        $order->getTotal()->willReturn(11000);
        $payment->getOrder()->willReturn($order);
        $payment->getCurrencyCode()->willReturn('EUR');
        $request->getSource()->willReturn($payment);
        $request->getTo()->willReturn('array');
        $request->setResult([
            'currencyiso3a' => 'EUR',
            'baseamount' => '11000'
        ])->shouldBeCalled();
        $this->execute($request);
    }
    function it_supports_only_convert_request_payment_source_and_array_to(
        Convert $request,
        PaymentInterface $payment
    ): void {
        $request->getSource()->willReturn($payment);
        $request->getTo()->willReturn('array');
        $this->supports($request)->shouldReturn(true);
    }
}
