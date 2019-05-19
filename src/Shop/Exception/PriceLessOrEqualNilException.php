<?php
declare(strict_types=1);

namespace App\Shop\Exception;

/**
 * Class PriceLessOrEqualNilException
 * @package App\Shop\Exception
 */
class PriceLessOrEqualNilException extends ShopException
{
    /**
     * PriceLessOrEqualNilException constructor.
     */
    public function __construct()
    {
        parent::__construct('Price is less or equal nil!');
    }
}
