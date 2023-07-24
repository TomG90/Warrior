<?php



declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', 'true');
set_time_limit(5);

class Warrior
{

    const MAX_LIVES = 100;

    /**
     * @var int
     **/
    private $lives;

    /**
     * @var int
     **/
    private $attack;

    /**
     * @var int
     **/
    private $defense;

    public function __construct(int $attack, int $defense)
    {
        $this->lives = self::MAX_LIVES;
        $this->attack = $attack;
        $this->defense = $defense;
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

    private function receiveDamage(int $damage): void
    {
        $this->lives -= $damage;
    }

    public function renderInfo(): void
    {
        echo 'Lives: ' . $this->lives . '<br />';
        echo 'Attack: ' . $this->attack . '<br />';
        echo 'Defense: ' . $this->defense . '<br />';
    }

    public function attack(Warrior $defender): void
    {
        // not implemented yet
    }

}

echo "Hello world\n";
/*
// Example of possible usage after implementation

$warrior1 = new Warrior('Chuck Norris', 40, 10);
$warrior1->renderInfo();

echo '<h3>VS.</h3>';

$warrior2 = new Warrior('Rambo', 30, 20);
$warrior2->renderInfo();

$arena = new Arena();
$arena->match($warrior1, $warrior2, 5);


// $ docker run -it --rm --name my-running-script -v "$PWD":/usr/src/myapp -w /usr/src/myapp php:8.2-cli php your-script.php
*/
