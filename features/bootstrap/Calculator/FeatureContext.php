<?php

namespace Feature\Calculator;

use Behat\Behat\Context\Context;
use App\Calculator\Square;
use PHPUnit\Framework\TestCase;
use \Exception;

/**
 * Class SquareContext
 */
class FeatureContext implements Context
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
     * @throws Exception
     * @Then Excepted calculate area is :a
     */
    public function calculateArea(float $a): void
    {
        TestCase::assertEquals($a, $this->square->calc());
    }

    /**
     * @throws Exception
     * @Then Excepted Exception
     */
    public function argumentsTooSmall(): void
    {
        try {
            $this->square->calc();

            TestCase::assertTrue(false);
        } catch (Exception $exception) {
            TestCase::assertTrue(true);
        }
    }
}
