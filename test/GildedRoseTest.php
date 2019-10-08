<?php

namespace App;

use App\Items\AgedBrie;
use App\Items\BackstagePass;
use App\Items\Sulfuras;
use App\UseCases\ParseDataUseCase;

/**
 * Class GildedRoseTest
 * @package App
 */
class GildedRoseTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @return void
     */
    public function testItems(): void
    {
        $item = new Item('+5 Dexterity Vest', 10, 20);
        $this->assertEquals(10, $item->getSellIn());
        $this->assertEquals(20, $item->getQuality());
        $item->updateQuality();
        $this->assertEquals(9, $item->getSellIn());
        $this->assertEquals(19, $item->getQuality());
    }

    /**
     * @return void
     */
    public function testAgedBrie(): void
    {
        $item = new AgedBrie('Aged Brie', 2, 0);
        $this->assertEquals(2, $item->getSellIn());
        $this->assertEquals(0, $item->getQuality());
        $item->updateQuality();
        $this->assertEquals(1, $item->getSellIn());
        $this->assertEquals(1, $item->getQuality());
    }

    /**
     * @return void
     */
    public function testBackstagePass(): void
    {
        $item = new BackstagePass('Backstage passes to a TAFKAL80ETC concert', 15, 20);
        $this->assertEquals(15, $item->getSellIn());
        $this->assertEquals(20, $item->getQuality());
        $item->updateQuality();
        $this->assertEquals(14, $item->getSellIn());
        $this->assertEquals(21, $item->getQuality());
    }

    /**
     * @return void
     */
    public function testSulfuras(): void
    {
        $item = new Sulfuras('Sulfuras, Hand of Ragnaros', 0, 80);
        $this->assertEquals(0, $item->getSellIn());
        $this->assertEquals(80, $item->getQuality());
        $item->updateQuality();
        $this->assertEquals(0, $item->getSellIn());
        $this->assertEquals(80, $item->getQuality());
    }

    /**
     * @return void
     */
    public function testItemFlow(): void
    {
        $data = [
            ['name' => '+5 Dexterity Vest', 'sell_in' => 10, 'quality' => 20]
        ];

        $items = (new ParseDataUseCase)
            ->setDataToParse($data)
            ->parse()
            ->getParsedData();
        $this->assertIsArray($items);
        $this->assertNotEmpty($items);

        $gildedRose = new GildedRose;
        $gildedRose->setItems($items);
        $gildedRose->setDays(2);
        $items = $gildedRose->getItems();

        $this->assertEquals(10, $items[0]->getSellIn());
        $this->assertEquals(20, $items[0]->getQuality());

        $gildedRose->updateQuality();
        $items = $gildedRose->getItems();

        $this->assertEquals(9, $items[0]->getSellIn());
        $this->assertEquals(19, $items[0]->getQuality());
    }
}
