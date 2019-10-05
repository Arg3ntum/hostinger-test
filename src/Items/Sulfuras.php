<?php

namespace App\Items;

use App\Item;

/**
 * Class Sulfuras
 * @package App\Items
 */
class Sulfuras extends Item
{

    /**
     * @return void
     */
    public function updateQuality(): void
    {
        $this->setQuality(80);
    }
}