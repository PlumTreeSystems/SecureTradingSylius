<?php
/**
 * Created by PhpStorm.
 * User: marius
 * Date: 18.11.30
 * Time: 17.18
 */

namespace PlumTreeSystems\SyliusSecureTradingPlugin\Action;

use Payum\Core\Action\ActionInterface;
use Payum\Core\Exception\RequestNotSupportedException;
use Payum\Core\Request\Convert;
use Sylius\Component\Core\Model\AdjustmentInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Core\Model\PaymentInterface;

final class ConvertPaymentAction implements ActionInterface
{
    /**
     * {@inheritdoc}
     *
     * @param Convert $request
     */
    public function execute($request): void
    {
        RequestNotSupportedException::assertSupports($this, $request);

        /** @var PaymentInterface $payment */
        $payment = $request->getSource();
        /** @var OrderInterface $order */
        $order = $payment->getOrder();

        $details = [];

        throw new \LogicException('Not implemented Sylius!');
//        $request->setResult($details);
    }

    /**
     * {@inheritdoc}
     */
    public function supports($request): bool
    {
        return
            $request instanceof Convert &&
            $request->getSource() instanceof PaymentInterface &&
            $request->getTo() === 'array'
            ;
    }

    /**
     * @param int $price
     *
     * @return float
     */
    private function formatPrice(int $price): float
    {
        return round($price / 100, 2);
    }
}
