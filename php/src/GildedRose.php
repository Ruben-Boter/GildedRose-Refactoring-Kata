<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @param Item[] $items
     */
    public function __construct(
        private array $items
    ) {
    }

    // $price is prijs waard
    // $ammount is hoeveelheid beschikbaar
    // wanneer $item price is minder dan 0 dan gaat de prijs 2x zo snel naar beneden
    // de price van een $item is niet minder dan 0
    // "Aged Brie"  wanneer de price meer wordt ga je er meer voor moeten betalen
    // De price is nooit meer dan 50
    // "Sulfras" hoeft nooit verkocht te worden of in price verminderen
    // "Backstage passes" wordt meer in bedrag wanneer er minder kaarten over zijn
    // de price wordt meer wanneer er minder dagen over zijn wanneer nog 10 dagen wordt de price per 2 toegevoegd en bij 5 dagen wordt de price per 3 toegevoegd
    // de price wordt 0 na het concert

    // "Conjured" gaat 2x zo snel in prijs naar beneden als gewoonlijk

    public function updateQuality(): void
    {
        foreach ($this->items as $i) {

            if ($i->name != 'Aged Brie' && $i->name != 'Backstage passes to a TAFKAL80ETC concert') {
                if ($i->price > 0 && $i->name == "Conjured Mana Cake") {
                    $i->price -= 2;
                } else if ($i->price > 0 && $i->name != 'Sulfuras, Hand of Ragnaros') {
                    $i->price--;
                }
            } else {
                if ($i->price < 50) {
                    $i->price++;
                    if ($i->name == 'Backstage passes to a TAFKAL80ETC concert' && $i->ammount < 11) {
                        if ($i->price < 50) {
                            $i->price++;
                        }
                        if ($i->ammount < 6 && $i->price < 50) {
                            $i->price++;
                        }
                    }
                }
            }

            if ($i->name != 'Sulfuras, Hand of Ragnaros') {
                $i->ammount--;
            }

            if ($i->ammount < 0) {
                if ($i->name != 'Aged Brie') {
                    if ($i->name != 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($i->price > 0 && $i->name != 'Sulfuras, Hand of Ragnaros') {
                            $i->price = max(0, $i->price--);
                        }
                    } else {
                        $i->price = 0;
                    }
                } else {
                    if ($i->price < 50) {
                        $i->price++;
                    }
                }
            }
        }
    }
}
