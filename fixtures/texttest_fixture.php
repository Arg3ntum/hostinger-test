<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\GildedRose;
use App\Item;
use App\Items\AgedBrie;
use App\Items\Sulfuras;
use App\Items\BackstagePass;

echo "OMGHAI!\n";

$items = array(
    new Item('+5 Dexterity Vest', 10, 20),
    new AgedBrie('Aged Brie', 2, 0),
    new Item('Elixir of the Mongoose', 5, 7),
    new Sulfuras('Sulfuras, Hand of Ragnaros', 0, 80),
    new Sulfuras('Sulfuras, Hand of Ragnaros', -1, 80),
    new BackstagePass('Backstage passes to a TAFKAL80ETC concert', 15, 20),
    new BackstagePass('Backstage passes to a TAFKAL80ETC concert', 10, 49),
    new BackstagePass('Backstage passes to a TAFKAL80ETC concert', 5, 49),
    // this conjured item does not work properly yet
    new Item('Conjured Mana Cake', 3, 6)
);

$app = new GildedRose($items);

$days = 2;


for ($i = 0; $i < $days; $i++) {
    echo("-------- day $i --------\n");
    echo("name, sellIn, quality\n");
    foreach ($items as $item) {
        echo $item . PHP_EOL;
    }
    echo PHP_EOL;
    $app->updateQuality();
}
