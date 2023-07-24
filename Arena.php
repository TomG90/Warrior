<?php

declare(strict_types=1);

require 'index.php';
class Arena
{
    public function match(Warrior $warrior1, Warrior $warrior2, int $round): void
    {
        if ($warrior1->getLives() > $warrior2->getLives()) {
            echo $warrior1->getName() . ' wins!';
        } elseif ($warrior1->getLives() < $warrior2->getLives()) {
            echo $warrior2->getName() . ' wins!';
        } else {
            echo 'Draw!';
        }
    }
}