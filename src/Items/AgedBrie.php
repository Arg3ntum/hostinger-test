<?php

namespace App\Items;

use App\Item;

/**
 * Class AgedBrie
 * @package App\Items
 */
class AgedBrie extends Item
{
    /**
     * @return void
     */
    public function updateQuality(): void
    {
        $this->setSellIn($this->getSellIn() - 1);

        if ($this->getQuality() < $this->getMaxQuality()) {
            $this->setQuality($this->getQuality() + 1);
        }
    }
}