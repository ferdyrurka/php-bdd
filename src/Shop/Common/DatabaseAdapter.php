<?php
declare(strict_types=1);

namespace App\Shop\Common;

/**
 * Interface DatabaseAdapter
 * @package App\Shop\Service
 */
interface DatabaseAdapter
{
    /**
     * @param object $entity
     */
    public function persist(object $entity): void;

    /**
     *
     */
    public function flush(): void;
}
