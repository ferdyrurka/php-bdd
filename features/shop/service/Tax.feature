Feature: Tax shop
  Test tax

  Rules:
    - price less or equal 0
    - price it's ok if bigger than 0
  
  Scenario: price it's ok if bigger than 0
    When I set the tax 23
    And I set the price '10.00'
    Then Excepted the price '12.30'

  Scenario Outline: price less or equal 0
    When I set the tax <tax>
    And I set the price <price>
    Then Excepted exception because price to small

    Examples:
      | tax | price |
      | 23 | '0.00' |
      | 10 | '-1.00' |