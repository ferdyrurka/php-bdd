<?php
declare(strict_types=1);

namespace App\Test\Shop\Service;

use App\Shop\Exception\PriceLessOrEqualNilException;
use App\Shop\Service\TaxService;
use App\Shop\TaxCountryInterface;
use PHPUnit\Framework\TestCase;
use \Mockery;

/**
 * Class TaxServiceTest
 * @package App\Test\Shop\Service
 */
class TaxServiceTest extends TestCase
{
    /**
     * @var TaxService
     */
    private $taxService;

    /**
     *
     */
    protected function setUp(): void
    {
        $taxCountry = Mockery::mock(TaxCountryInterface::class);
        $taxCountry->shouldReceive('getTax')->andReturn(23);

        $this->taxService = new TaxService($taxCountry);
    }

    /**
     * @test
     */
    public function taxToSmall(): void
    {
        $this->expectException(PriceLessOrEqualNilException::class);
        $this->taxService->calculate(-1.0);
    }

    /**
     * @test
     */
    public function taxOk(): void
    {
        $this->assertEquals(1.23, $this->taxService->calculate(1.0));
    }
}
