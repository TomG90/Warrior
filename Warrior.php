<?php

declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 'true');
set_time_limit(5);

class Warrior
{
    private string $name;
    const MAX_LIVES = 100;

    private int $lives;

    private int $attack;

    private int $defense;



    public function __construct(string $name, int $attack, int $defense)
    {
        $this->lives = self::MAX_LIVES;
        $this->attack = $attack;
        $this->defense = $defense;
        $this->name = $name;
    }

    public function getLives(): int
    {
        return $this->lives;
    }

    public function getAttack(): int
    {
        return $this->attack;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function receiveDamage(int $damage): void
    {
        $this->lives -= $damage;
    }

    public function renderInfo(): void
    {
        echo 'Name: ' . $this->name . "\n";
        echo 'Lives: ' . $this->lives . "\n";
        echo 'Attack: ' . $this->attack . "\n";
        echo 'Defense: ' . $this->defense . "\n";
    }

    /**
     * @throws Exception
     */
    public function attack(Warrior $defender): void
    {
        $damage = $this->attack + rand(1, 6) - $defender->defense;

        if ($damage > 0) {
            $defender->lives -= $damage;
        }
        if ($this->lives <= 0) {
            throw new Exception('Warrior: ' . $this->name . ' has died.');
        }

        $berserkr = $this->lives < self::MAX_LIVES/2;

        if ($berserkr) {
            for ($i = 0; $i < 3; $i++) {
                $chance = rand(1, 6);
                $damage += $chance;
            }
        }
    }

}


$warrior1 = new Warrior('Chuck Norris', 10, 10);
$warrior2 = new Warrior('Rambo', 20, 5);

$arena = new Arena();
$arena->match($warrior1, $warrior2, 20);


/*
// $ docker run -it --rm --name my-running-script -v "$PWD":/usr/src/myapp -w /usr/src/myapp php:8.2-cli php your-script.php
*/
