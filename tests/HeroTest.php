<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../src/Entity.php";
require_once __DIR__ . "/../src/Logger.php";
require_once __DIR__ . "/../src/Hero.php";

final class HeroTest extends TestCase
{
    public function testHealthIsInteger(){

        $hero = new Hero();
        $hero->setFirstStats();

        $this->assertIsInt($hero->getHealth());
    }

    public function testStrengthIsInteger(){

        $hero = new Hero();
        $hero->setFirstStats();

        $this->assertIsInt($hero->getStrength());
    }

    public function testDefenceIsInteger(){

        $hero = new Hero();
        $hero->setFirstStats();

        $this->assertIsInt($hero->getDefence());
    }

    public function testSpeedIsInteger(){

        $hero = new Hero();
        $hero->setFirstStats();

        $this->assertIsInt($hero->getSpeed());
    }

    public function testLuckIsInteger(){

        $hero = new Hero();
        $hero->setFirstStats();

        $this->assertIsInt($hero->getLuck());
    }

    public function testSpellIsArray(){

        $hero = new Hero();
        $hero->setFirstStats();

        $this->assertIsArray($hero->getSpell());
    }
}