Feature: Last changes on admin dashboard
  In order to see the last inscriptions
  As a member logged in
  I want display a list of the last 3 inscription

  Scenario: Administrator visit the dashboard
    Given I am on "admin"
    And I am logged in as admin
    Then I should see the last 3 inscriptions