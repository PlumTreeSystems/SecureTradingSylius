![travis](https://api.travis-ci.org/PlumTreeSystems/SyliusSecureTradingPlugin.svg?branch=master "Travis")

# SecureTradingSylius WIP

This is a sylius plugin that implements the PlumTreeSystems/SecureTrading gateway

## Usage

Install package via `composer require plumtreesystems/sylius-secure-trading-plugin`.

Override the `pts_sylius_st_plugin.action.convert_payment` to implement own business logic.

_Best to just copy and paste the existing `Action/ConvertPaymentAction` class and just tweak it to your liking._
