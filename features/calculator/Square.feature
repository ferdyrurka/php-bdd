Feature: Square calculator
  Test Square test

  Rules:
  - a it must be bigger 0

  Scenario: a value is good
    When Length is 10.00
    Then Excepted calculate area is 100.0

  Scenario Outline: excepted Exception because a is 0
    When Length is <length>
    Then Excepted Exception because arguments to small

    Examples:
      | length |
      | 0.00 |
      | '-1.00' |
