<?php

declare(strict_types=1);

require 'Warrior.php';
class Arena
{
    public function match(Warrior $warrior1, Warrior $warrior2, $numRounds) {
        echo "{$warrior1->getName()} vs. {$warrior2->getName()}\n";

        for ($round = 1; $round <= $numRounds; $round++) {
            echo "\n--- Round $round ---\n";
            try {
                if ($round % 2 === 1) {
                    // Warrior1 attacks first in odd rounds
                    echo "{$warrior2->getName()} has {$warrior2->getLives()} health remaining.\n";
                    $warrior1->attack($warrior2);
                } else {
                    // Warrior2 attacks first in even rounds
                    echo "{$warrior1->getName()} has {$warrior1->getLives()} health remaining.\n";
                    $warrior2->attack($warrior1);
                }
                echo "{$warrior1->getName()}: Attack: {$warrior1->getAttack()}, Defense: {$warrior1->getDefense()}\n";
                echo "{$warrior2->getName()}: Attack: {$warrior2->getAttack()}, Defense: {$warrior2->getDefense()}\n";
            } catch (Exception $e) {
                // Handle defeated warrior
                echo $e->getMessage();
                break;
            }
        }

        // Determine the winner
        if ($warrior1->getLives() > $warrior2->getLives()) {
            echo "{$warrior1->getName()} is the winner!\n";
        } elseif ($warrior1->getLives() < $warrior2->getLives()) {
            echo "{$warrior2->getName()} is the winner!\n";
        } else {
            echo "It's a draw!\n";
        }
    }
}

