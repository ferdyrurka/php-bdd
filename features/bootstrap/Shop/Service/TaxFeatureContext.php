<?php
declare(strict_types=1);

namespace Feature\Shop\Service;

use App\Shop\Exception\PriceLessOrEqualNilException;
use App\Shop\Service\TaxService;
use App\Shop\TaxCountryInterface;
use Behat\Behat\Context\Context;
use \Mockery;
use PHPUnit\Framework\TestCase;

/**
 * Class TaxFeatureContext
 * @package Feature\Shop\Service
 */
class TaxFeatureContext implements Context
{
    /**
     * @var TaxCountryInterface
     */
    private $taxCountry;

    /**
     * @var TaxService
     */
    private $taxService;

    /**
     * @var float
     */
    private $price;

    /**
     *
     */
    public function __construct()
    {
        $this->taxCountry = Mockery::mock(TaxCountryInterface::class);
        $this->taxService = new TaxService($this->taxCountry);
    }

    /**
     * @param int $taxPercent
     * @When I set the tax :taxPercent
     */
    public function setTax(int $taxPercent): void
    {
        $this->taxCountry->shouldReceive('getTax')->once()
            ->andReturn($taxPercent)
        ;
    }

    /**
     * @param float $price
     * @When I set the price :price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    /**
     * @param float $exceptedPrice
     * @throws PriceLessOrEqualNilException
     * @Then Excepted the price :exceptedPrice
     */
    public function exceptedValue(float $exceptedPrice): void
    {
        TestCase::assertEquals(
            $exceptedPrice,
            $this->taxService->calculate($this->price)
        );
    }

    /**
     * @Then Excepted exception because price to small
     */
    public function exceptedException(): void
    {
        try {
            $this->taxService->calculate($this->price);
            TestCase::assertTrue(false);
        } catch (PriceLessOrEqualNilException $calculatorException) {
            TestCase::assertTrue(true);
        }
    }
}
