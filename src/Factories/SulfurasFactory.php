<?php

namespace App\Factories;

use App\Item;
use App\Items\Sulfuras;

/**
 * Class SulfurasFactory
 * @package App\Factories
 */
class SulfurasFactory implements DefaultFactory
{
    /**
     * @param array $data
     * @return Sulfuras|null
     */
    public function create(array $data): ?Item
    {
        $model = new Sulfuras;
        return $model->setQuality($data['quality'] ?? null)
            ->setSellIn($data['sell_in'] ?? null)
            ->setName($data['name']);
    }
}