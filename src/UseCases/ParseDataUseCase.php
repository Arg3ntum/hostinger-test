<?php

namespace App\UseCases;

use App\Factories\AgedBrieFactory;
use App\Factories\BackstagePassFactory;
use App\Factories\ItemFactory;
use App\Factories\SulfurasFactory;

/**
 * Class ParseDataUseCase
 * @package App\UseCases
 */
class ParseDataUseCase
{
    /**
     * @var array
     */
    private $parsedData = [];
    /**
     * @var array
     */
    private $dataToParse = [];

    /**
     * ParseDataUseCase constructor.
     * @param array $dataToParse
     */
    public function __construct(array $dataToParse = [])
    {
        $this->dataToParse = $dataToParse;
    }

    /**
     * @param array $dataToParse
     * @return self
     */
    public function setDataToParse(array $dataToParse): self
    {
        $this->dataToParse = $dataToParse;
        return $this;
    }

    /**
     * @return array
     */
    public function getParsedData(): array
    {
        return $this->parsedData;
    }

    /**
     * @return ParseDataUseCase
     */
    public function parse(): self
    {
        if (!empty($this->dataToParse)) {
            foreach ($this->dataToParse as $item) {
                if (isset($item['name'], $item['quality'], $item['sell_in'])) {
                    switch ($item['name']) {
                        case 'Aged Brie':
                            $entity = (new AgedBrieFactory)->create($item);
                            if (null !== $entity) {
                                $this->parsedData[] = $entity;
                            }
                            break;
                        case 'Sulfuras, Hand of Ragnaros':
                            $entity = (new SulfurasFactory())->create($item);
                            if (null !== $entity) {
                                $this->parsedData[] = $entity;
                            }
                            break;
                        case 'Backstage passes to a TAFKAL80ETC concert':
                            $entity = (new BackstagePassFactory())->create($item);
                            if (null !== $entity) {
                                $this->parsedData[] = $entity;
                            }
                            break;
                        default:
                            $entity = (new ItemFactory())->create($item);
                            if (null !== $entity) {
                                $this->parsedData[] = $entity;
                            }
                            break;
                    }
                }
            }
        }

        return $this;
    }
}