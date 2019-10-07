<?php

namespace App\Factories;

use App\Item;

/**
 * Class ItemFactory
 * @package App\Factories
 */
class ItemFactory implements DefaultFactory
{
    /**
     * @param array $data
     * @return Item|null
     */
    public function create(array $data): ?Item
    {
        $model = new Item;
        return $model->setQuality($data['quality'] ?? null)
            ->setSellIn($data['sell_in'] ?? null)
            ->setName($data['name']);
    }
}