<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use App\Square;
use PHPUnit\Framework\TestCase;

/**
 * Class SquareContext
 */
class FutureContext implements Context
{
    /**
     * @var Square
     */
    private $square;

    /**
     * @param float $a
     * @Given Length is :a
     */
    public function createNewObject(float $a): void
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
