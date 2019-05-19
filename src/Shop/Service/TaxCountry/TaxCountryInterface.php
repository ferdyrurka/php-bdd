<?php
declare(strict_types=1);

namespace App\Shop;

/**
 * Interface TaxCountryInterface
 * @package App\Shop
 */
interface TaxCountryInterface
{
    /**
     * @return integer
     * return % tax
     */
    public function getTax(): int;
}
