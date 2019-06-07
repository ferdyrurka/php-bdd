<?php
declare(strict_types=1);

namespace App\Shop\Service;

use App\Shop\Service\TaxCountry\TaxCountryInterface;

/**
 * Interface TaxServiceInterface
 * @package App\Shop\Service
 */
interface TaxServiceInterface
{
    /**
     * TaxServiceInterface constructor.
     * @param TaxCountryInterface $taxCountry
     */
    public function __construct(TaxCountryInterface $taxCountry);

    /**
     * @param float $price
     * @return float
     */
    public function calculate(float $price): float;
}
