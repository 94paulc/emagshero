<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../src/Entity.php";
require_once __DIR__ . "/../src/Logger.php";
require_once __DIR__ . "/../src/Beast.php";
require_once __DIR__ . "/../src/Hero.php";
require_once __DIR__ . "/../src/Game.php";

final class GameTest extends TestCase
{
    public function testRoleSwichReturnsArray(){

        $hero = new Hero();
        $beast = new Beast();

        $hero->setFirstStats();
        $beast->setFirstStats();

        $game = new Game($hero, $beast);

        $this->assertIsArray($game->roleSwitching($hero, $beast));
    }
    public function testDefenderIsLuckyReturnsBoolean(){

        $hero = new Hero();
        $beast = new Beast();

        $hero->setFirstStats();
        $beast->setFirstStats();

        $game = new Game($hero, $beast);

        $this->assertIsBool($game->defenderIsLucky($hero));
    }
}