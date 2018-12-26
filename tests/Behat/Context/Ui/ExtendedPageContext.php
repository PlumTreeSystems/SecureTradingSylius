<?php
/**
 * Created by PhpStorm.
 * User: marius
 * Date: 18.12.17
 * Time: 14.09
 */

namespace Tests\PlumTreeSystems\SyliusSecureTradingPlugin\Behat\Context\Ui;

use Behat\Behat\Context\Context;
use Behat\Mink\Element\DocumentElement;
use Behat\MinkExtension\Context\MinkContext;
use Tests\PlumTreeSystems\SyliusSecureTradingPlugin\Behat\Page\JQueryHelper;

class ExtendedPageContext extends MinkContext implements Context
{

    private $document;

    private $filesPath;

    /**
     * ExtendedPageContext constructor.
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->filesPath = $parameters['files_path'];
    }

    /**
     * @When I submit the form
     */
    public function iSubmitForm()
    {
        $this->getDocument()->pressButton('Save');
    }

    private function getDocument()
    {
        if (null === $this->document) {
            $this->document = new DocumentElement($this->getSession());
        }

        return $this->document;
    }

    public function clickLinkInsideElement($link, $cssSelector)
    {
        $box = $this->getSession()->getPage()->find('css', $cssSelector);
        $box->clickLink($link);
    }

    public function clickElement($cssSelector)
    {
        $box = $this->getSession()->getPage()->find('css', $cssSelector);
        $box->click();
    }

    /**
     * Example: When I press element on save filter button
     * Example: And I press element on save filter button
     *
     * @When /^(?:|I )press element on save filter button$/
     */
    public function clickDiv()
    {
        $element = $this->getSession()->getPage()->find('css', '#saveFilterButton');

        if (empty($element)) {
            throw new \Exception("Save filter button not found");
        }

        $element->click();
    }
    /**
     * @Given /^I wait for confirmation$/
     */public function iWaitForConfirmation()
    {
        JQueryHelper::waitForAsynchronousActionsToFinish($this->getSession());
    }
}
