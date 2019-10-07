<?php

namespace App\Factories;

use App\Item;
use App\Items\BackstagePass;

/**
 * Class BackstagePassFactory
 * @package App\Factories
 */
class BackstagePassFactory implements DefaultFactory
{
    /**
     * @param array $data
     * @return BackstagePass|null
     */
    public function create(array $data): ?Item
    {
        $model = new BackstagePass;
        return $model->setQuality($data['quality'] ?? null)
            ->setSellIn($data['sell_in'] ?? null)
            ->setName($data['name']);
    }
}