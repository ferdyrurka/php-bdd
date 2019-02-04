<?php
declare(strict_types=1);

namespace App\Test;

use App\Square;
use PHPUnit\Framework\TestCase;
use \Exception;

/**
 * Class SquareTest
 */
class SquareTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function calcGood(): void
    {
        $square = new Square(9.4);
        $this->assertEquals(9.4^2, $square->calc());
    }
    /**
     * @test
     * @throws Exception
     */
    public function exceptionMinusArgs(): void
    {
        $square = new Square(-9.4);
        $this->expectException(Exception::class);
        $square->calc();
    }
}