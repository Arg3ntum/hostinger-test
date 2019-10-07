<?php

namespace App\Factories;

use App\Item;

/**
 * Interface DefaultFactory
 * @package App\Factories
 */
interface DefaultFactory
{
    /**
     * @param array $data
     * @return Item|null
     */
    public function create(array $data): ?Item;
}