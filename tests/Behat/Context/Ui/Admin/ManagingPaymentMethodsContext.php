<?php
/**
 * Created by PhpStorm.
 * User: marius
 * Date: 18.12.17
 * Time: 14.05
 */

namespace Tests\PlumTreeSystems\SyliusSecureTradingPlugin\Behat\Context\Ui\Admin;


use Behat\Behat\Context\Context;
use Sylius\Behat\Page\Admin\PaymentMethod\CreatePageInterface;

class ManagingPaymentMethodsContext implements Context
{
    /**
     * @var CreatePageInterface
     */
    private $createPage;

    /**
     * ManagingPaymentMethodsContext constructor.
     * @param CreatePageInterface $createPage
     */
    public function __construct(CreatePageInterface $createPage)
    {
        $this->createPage = $createPage;
    }

    /**
     * @Given /^I want to create a new Secure Trading payment method$/
     * @throws \FriendsOfBehat\PageObjectExtension\Page\UnexpectedPageException
     */
    public function iWantToCreateANewSecureTradingPaymentMethod()
    {
        $this->createPage->open(['factory' => 'plumtreesystems_securetrading']);
    }
}