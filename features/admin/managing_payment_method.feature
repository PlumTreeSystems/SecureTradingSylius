@managing_payment_method
  Feature: Adding a new Secure trading payment method
    In order to allow payment for orders, using the Secure Trading gateway
    As an Administrator
    I want to add new payment methods to the system

  Background:
    Given the store operates on a channel named "US" in "USD" currency
    And I am logged in as an administrator

  @ui
  Scenario: Adding a new secure trading payment method
    Given I want to create a new Secure Trading payment method
    When I fill in "Code" with "secure"
    And I fill in "Webservice username" with "test_user"
    And I fill in "Webservice password" with "test_psw"
    And I fill in "Site reference" with "test_ref"
    And I fill in "Name" with "Secure Trading"
    And I add it
    Then I should be notified that it has been successfully created
    And the payment method "Secure Trading" should appear in the registry