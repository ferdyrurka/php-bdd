<?php
declare(strict_types=1);

namespace spec\App\Shop\Service;

use App\Shop\Exception\PriceLessOrEqualNilException;
use App\Shop\Service\TaxCountry\TaxCountryInterface;
use PhpSpec\ObjectBehavior;
use \Mockery;

/**
 * Class TaxServiceSpec
 * @package spec\App\Shop\Service
 */
class TaxServiceSpec extends ObjectBehavior
{
    /**
     * @param TaxCountryInterface $taxCountry
     * @throws PriceLessOrEqualNilException
     */
    public function it_is_tax_calculate_ok(TaxCountryInterface $taxCountry): void
    {
        $taxCountry->getTax()->willReturn(23);
        $this->beConstructedWith($taxCountry);

        $this->calculate(10.00)->shouldReturn(12.30);
    }

    /**
     * @dataProvider get_small_prices
     * @param float $price
     */
    public function it_is_price_to_small($price): void
    {
        $taxCountry = Mockery::mock(TaxCountryInterface::class);
        $taxCountry->shouldReceive('getTax')->once()->andReturn(23);

        $this->beConstructedWith($taxCountry);

        $this->shouldThrow(PriceLessOrEqualNilException::class)
            ->during('calculate', [$price])
        ;
    }

    /**
     * @return array
     */
    public function get_small_prices(): array
    {
        return [
            -1.00,
            0.00
        ];
    }
}
