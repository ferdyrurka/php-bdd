<?php
declare(strict_types=1);

namespace App\Shop\Service;

use App\Shop\Exception\PriceLessOrEqualNilException;
use App\Shop\TaxCountryInterface;

/**
 * Class TaxService
 * @package App\Shop\Service
 */
class TaxService implements TaxServiceInterface
{
    /**
     * @var TaxCountryInterface
     */
    private $taxCountry;

    /**
     * TaxService constructor.
     * @param TaxCountryInterface $taxCountry
     */
    public function __construct(TaxCountryInterface $taxCountry)
    {
        $this->taxCountry = $taxCountry;
    }

    /**
     * @param float $price
     * @return float
     * @throws PriceLessOrEqualNilException
     */
    public function calculate(float $price): float
    {
        if ($price <= 0) {
            throw new PriceLessOrEqualNilException();
        }

        return $price *
            ($this->taxCountry->getTax() / 100 + 1)
            ;
    }
}
