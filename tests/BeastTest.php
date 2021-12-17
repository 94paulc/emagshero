<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../src/Entity.php";
require_once __DIR__ . "/../src/Logger.php";
require_once __DIR__ . "/../src/Beast.php";

final class BeastTest extends TestCase
{
    public function testHealthIsInteger(){

        $beast = new Beast();
        $beast->setFirstStats();

        $this->assertIsInt($beast->getHealth());
    }

    public function testStrengthIsInteger(){

        $beast = new Beast();
        $beast->setFirstStats();

        $this->assertIsInt($beast->getStrength());
    }

    public function testDefenceIsInteger(){

        $beast = new Beast();
        $beast->setFirstStats();

        $this->assertIsInt($beast->getDefence());
    }

    public function testSpeedIsInteger(){

        $beast = new Beast();
        $beast->setFirstStats();

        $this->assertIsInt($beast->getSpeed());
    }

    public function testLuckIsInteger(){

        $beast = new Beast();
        $beast->setFirstStats();

        $this->assertIsInt($beast->getLuck());
    }
}