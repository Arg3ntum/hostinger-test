<?php

namespace App;

/**
 * Class Item
 * @package App
 */
class Item
{

    /**
     * @var
     */
    private $name;
    /**
     * @var
     */
    private $sell_in;
    /**
     * @var
     */
    private $quality;

    /**
     * @var int
     */
    private $minQuality = 0;
    /**
     * @var int
     */
    private $maxQuality = 50;

    /**
     * Item constructor.
     * @param $name
     * @param $sell_in
     * @param $quality
     */
    function __construct($name = null, $sell_in = null, $quality = null)
    {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return (string)$this->name;
    }

    /**
     * @param $name
     * @return Item
     */
    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getSellIn(): int
    {
        return (int)$this->sell_in;
    }

    /**
     * @param $sell_in
     * @return Item
     */
    public function setSellIn($sell_in): self
    {
        $this->sell_in = $sell_in;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuality(): int
    {
        return (int)$this->quality;
    }

    /**
     * @param $quality
     * @return Item
     */
    public function setQuality($quality): self
    {
        $this->quality = $quality;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinQuality(): int
    {
        return $this->minQuality;
    }

    /**
     * @param int $minQuality
     * @return Item
     */
    public function setMinQuality(int $minQuality): self
    {
        $this->minQuality = $minQuality;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxQuality(): int
    {
        return $this->maxQuality;
    }

    /**
     * @param int $maxQuality
     * @return Item
     */
    public function setMaxQuality(int $maxQuality): self
    {
        $this->maxQuality = $maxQuality;
        return $this;
    }

    /**
     * @return void
     */
    public function updateQuality(): void
    {
        $this->setSellIn($this->getSellIn() - 1);

        if ($this->getQuality() > $this->getMinQuality()) {
            $this->setQuality($this->getQuality() - ((0 > $this->getSellIn()) ? 2 : 1));
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }


}

