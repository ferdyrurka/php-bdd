Feature: Square calculator
  Test Square test

  Rules:
  - a it must be bigger 0

  Scenario: a value is good
    Given Length is 10.00
    Then Excepted calculate area is 100.0

  Scenario: excepted Exception because a is 0
    Given Length is 0.00
    Then Excepted Exception because arguments to small

  Scenario: excepted Exception because a is -1
    Given Length is '-1.00'
    Then Excepted Exception because arguments to small
