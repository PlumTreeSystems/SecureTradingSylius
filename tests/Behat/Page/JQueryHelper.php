<?php
/**
 * Created by PhpStorm.
 * User: marius
 * Date: 18.12.21
 * Time: 17.27
 */

namespace Tests\PlumTreeSystems\SyliusSecureTradingPlugin\Behat\Page;

use Behat\Mink\Session;

abstract class JQueryHelper
{
    /**
     * @param Session $session
     */
    public static function waitForAsynchronousActionsToFinish(Session $session)
    {
        $session->wait(50000, '0 === jQuery.active');
    }

    /**
     * @param Session $session
     */
    public static function wait(Session $session)
    {
        $session->wait(1000);
    }

    /**
     * @param Session $session
     */
    public static function waitFiveSeconds(Session $session)
    {
        $session->wait(5000);
    }
}