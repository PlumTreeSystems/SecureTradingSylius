<?php
/**
 * Created by PhpStorm.
 * User: marius
 * Date: 18.12.19
 * Time: 15.12
 */

namespace Tests\PlumTreeSystems\SyliusSecureTradingPlugin\Behat\Context\Ui\Shop;


use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Sylius\Behat\Page\Shop\Checkout\CompletePageInterface;
use Sylius\Behat\Page\Shop\Order\ShowPageInterface;
use Tests\PlumTreeSystems\SyliusSecureTradingPlugin\Behat\Mocker\SecureTradingApiGatewayMocker;

class SecureTradingShopContext implements Context
{

    /**
     * @var CompletePageInterface
     */
    private $summaryPage;
    /**
     * @var ShowPageInterface
     */
    private $orderDetails;
    /**
     * @var SecureTradingApiGatewayMocker
     */
    private $secureTradingApiMocker;

    /**
     * @param CompletePageInterface $summaryPage
     * @param ShowPageInterface $orderDetails
     * @param SecureTradingApiGatewayMocker $secureTradingApiMocker
     */
    public function __construct(
        CompletePageInterface $summaryPage,
        ShowPageInterface $orderDetails,
        SecureTradingApiGatewayMocker $secureTradingApiMocker
    ) {
        $this->summaryPage = $summaryPage;
        $this->orderDetails = $orderDetails;
        $this->secureTradingApiMocker = $secureTradingApiMocker;
    }

    /**
     * @When /^I confirm my order with Secure Trading payment$/
     */
    public function iConfirmMyOrderWithSecureTradingPayment()
    {
        $this->summaryPage->confirmOrder();
    }
}