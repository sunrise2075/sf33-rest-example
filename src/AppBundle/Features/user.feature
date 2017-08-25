Feature: Manage Users data via the RESTful API

  In order to offer the User resource via an hypermedia API
  As a client software developer
  I need to be able to retrieve, create, update, and delete JSON encoded User resources


  Background:
    Given there are Users with the following details:
    | uid | username | email          | password |
    | u1  | peter    | peter@test.com | testpass |
    | u2  | john     | john@test.org  | johnpass |
#    And there are Accounts with the following details:
#    | uid | name     | users |
#    | a1  | account1 | u1    |
#    And I am successfully logged in with username: "peter", and password: "testpass"
#    And when consuming the endpoint I use the "headers/content-type" of "application/json"

@t
  Scenario: User cannot GET a Collection of User objects
    When I send a "GET" request to "/users"
    Then the response code should 405
