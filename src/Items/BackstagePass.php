<?php

namespace App\Items;

use App\Item;

/**
 * Class BackstagePass
 * @package App\Items
 */
class BackstagePass extends Item
{
    /**
     * @var array
     */
    private $lowerThan = [10, 5];

    /**
     * @return array
     */
    public function getLowerThan(): array
    {
        return $this->lowerThan;
    }

    /**
     * @param array $lowerThan
     * @return self
     */
    public function setLowerThan(array $lowerThan): self
    {
        $this->lowerThan = $lowerThan;
        return $this;
    }


    /**
     * @return void
     */
    public function updateQuality(): void
    {
        $this->setSellIn($this->getSellIn() - 1);

        if (0 === $this->getSellIn()) {
            $this->setQuality(0);
        }

        if ($this->getQuality() < $this->getMaxQuality()) {
            $this->setQuality($this->getQuality() + 1);
        }

        if (!empty($this->lowerThan)) {
            foreach ($this->lowerThan as $lowerThan) {
                if ($this->getSellIn() <= (int)$lowerThan && $this->getMaxQuality() > $this->getQuality()) {
                    $this->setQuality($this->getQuality() + 1);
                }
            }
        }
    }
}