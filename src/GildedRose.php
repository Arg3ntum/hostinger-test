<?php

namespace App;

/**
 * Class GildedRose
 * @package App
 */
class GildedRose
{

    /**
     * @var array
     */
    private $items = [];
    /**
     * @var int
     */
    private $days = 1;
    /**
     * @var string
     */
    private $renderedData = "";

    /**
     * GildedRose constructor.
     * @param array $items
     * @param int $days
     */
    public function __construct(array $items = [], int $days = 1)
    {
        $this->items = $items;
        $this->days = $days;
    }

    /**
     * @param int $days
     * @return GildedRose
     */
    public function setDays(int $days): self
    {
        $this->days = $days;
        return $this;
    }

    /**
     * @param array $items
     * @return GildedRose
     */
    public function setItems(array $items): self
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @return array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return int
     */
    public function getDays(): int
    {
        return $this->days;
    }

    /**
     * @return GildedRose
     */
    public function updateQuality(): self
    {
        foreach ($this->items as $item) {
            $item->updateQuality();
        }

        return $this;
    }

    /**
     * @return GildedRose
     */
    public function render(): self
    {
        for ($i = 0; $i < $this->days; $i++) {
            $this->renderedData .= "-------- day " . ($i + 1) . " --------\n";
            $this->renderedData .= "name, sellIn, quality\n";
            foreach ($this->items as $item) {
                $this->renderedData .= $item . PHP_EOL;
            }
            $this->renderedData .= PHP_EOL;
            $this->updateQuality();
        }
        return $this;
    }

    /**
     * @return null
     */
    public function getRenderedData()
    {
        return $this->renderedData;
    }
}

