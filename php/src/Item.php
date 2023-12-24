<?php

declare(strict_types=1);

namespace GildedRose;

class Item implements \Stringable
{
    public string $name;
    public int $sellIn;
    public int $quality;
    
    public function __construct($name, $sellIn, $quality) {
        $this->name = $name;
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    public function __toString(): string
    {
        return (string) "{$this->name}, {$this->sellIn}, {$this->quality}";
    }
}
