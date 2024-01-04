<?php

declare(strict_types=1);

namespace GildedRose;

class Item implements \Stringable
{
    public string $name;
    public int $ammount;
    public int $price;
    
    public function __construct($name, $ammount, $price) {
        $this->name = $name;
        $this->ammount = $ammount;
        $this->price = $price;
    }

    public function __toString(): string
    {
        return (string) "{$this->name}, {$this->ammount}, {$this->price}";
    }
}
