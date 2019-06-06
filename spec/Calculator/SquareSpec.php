<?php

namespace spec\App\Calculator;

use App\Calculator\CalculatorException;
use PhpSpec\ObjectBehavior;

/**
 * Class SquareSpec
 * @package spec\App\Calculator
 */
class SquareSpec extends ObjectBehavior
{
    /**
     * @throws CalculatorException
     */
    public function it_is_ok(): void
    {
        $this->beConstructedWith(10);
        $this->calc()->shouldReturn((float) 100);
    }

    /**
     * @dataProvider incorrectArgsDataProvider
     * @param int $a
     */
    public function it_is_args_to_small($a): void
    {
        $this->beConstructedWith($a);
        $this->shouldThrow(CalculatorException::class)
            ->during('calc')
        ;
    }

    /**
     * @return array
     */
    public function incorrectArgsDataProvider(): array
    {
        return [
          [-1],
          [0]
        ];
    }
}
