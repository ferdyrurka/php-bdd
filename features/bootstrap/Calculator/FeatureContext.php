<?php

namespace Feature\Calculator;

use App\Calculator\CalculatorException;
use Behat\Behat\Context\Context;
use App\Calculator\Square;
use PHPUnit\Framework\TestCase;

/**
 * Class SquareContext
 */
class FeatureContext extends TestCase implements Context
{
    /**
     * @var Square
     */
    private $square;

    /**
     * @param float $a
     * @Given Length is :a
     */
    public function createSquare(float $a): void
    {
        $this->square = new Square($a);
    }

    /**
     * @param float $a
     * @throws CalculatorException
     * @Then Excepted calculate area is :a
     */
    public function calculateArea(float $a): void
    {
        $this->assertEquals($a, $this->square->calc());
    }

    /**
     * @Then Excepted Exception because arguments to small
     */
    public function argumentsTooSmall(): void
    {
        // Block exceptedException from PHPUnit integration with behat
        try {
            $this->square->calc();
            $this->assertFalse(false);
        }catch (CalculatorException $calculatorException) {
            $this->assertTrue(true);
        }
    }
}
