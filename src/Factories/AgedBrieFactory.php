<?php

namespace App\Factories;

use App\Item;
use App\Items\AgedBrie;

/**
 * Class AgedBrieFactory
 * @package App\Factories
 */
class AgedBrieFactory implements DefaultFactory
{
    /**
     * @param array $data
     * @return Item|null
     */
    public function create(array $data): ?Item
    {
        $model = new AgedBrie;
        return $model->setQuality($data['quality'] ?? null)
            ->setSellIn($data['sell_in'] ?? null)
            ->setName($data['name']);
    }
}