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

        $details = $this->preparePaymentDetailsFields($payment, $order);

//        throw new \LogicException('Not implemented Sylius!');
        $request->setResult($details);
    }

    private function checkCacheToken()
    {

    }

    private function prepareOperationFields()
    {
        $required = [
            'requesttypedescriptions' => '',
            'sitereference' => '',
            'accounttypedescription' => '',
        ];

        $optional = [
            'parenttransactionreference' => '',
            'authmethod' => '',
            'credentialsonfile' => 0,
            'initiationreason' => 'A'
        ];
        return array_merge($required);
    }

    private function preparePaymentDetailsFields(PaymentInterface $payment, OrderInterface $order)
    {
        $required = [
            'currencyiso3a' => $payment->getCurrencyCode(),
            'baseamount' => $order->getTotal()
        ];
        return $required;
    }

    private function prepareMerchantDetailsFields()
    {
        $optional = [
            'merchantemail' => '',
            'orderreference' => '',
            'chargedescription' => '',
            'operatorname' => ''
        ];
        return $optional;
    }

    private function prepareCustomerDeliveryFields()
    {
        $optional = [
            'customerpremise' => '',
            'customerstree' => '',
            'customertown' => '',
            'customercounty' => '',
            'customercountryiso2a' => 'GB',
            'customerpostcode' => '',
            'customeremail' => '',
            'customertelephonetype' => '',
            'customertelephone' => '',
            'customerprefixname' => '',
            'customerfirstname' => '',
            'customermiddlename' => '',
            'customerlastname' => '',
            'customersuffixname' => '',
            'customerforwardedip' => '',
            'customerip' => ''
        ];
        return $optional;
    }

    private function prepareSettlementFields()
    {
        $optional = [
            'settleduedate' => '',
            'settlestatus' => ''
        ];
        return $optional;
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
}
