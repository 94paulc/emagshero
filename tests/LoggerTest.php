<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../src/Logger.php";

final class LoggerTest extends TestCase
{
    /**
     * !! THIS WON'T WORK
     * noWinners() method should use RETURN instead ECHO to work
     */
    public function testTextEndBattle(){

        $logger = new Logger();
        $this->assertEquals('END GAME. No winners.', $logger->noWinners());
    }

    /**
     * !! THIS WON'T WORK
     * strikerHasNoSpells() method should use RETURN instead ECHO to work
     */
    public function testTextStrikerHasNoSpells(){

        $logger = new Logger();
        $this->assertEquals('<b> -- Striker has no spells.</b><br>', $logger->strikerHasNoSpells());
    }

    /**
     * !! THIS WON'T WORK
     * defenderHasNoSpells() method should use RETURN instead ECHO to work
     */
    public function testTextDefenderHasNoSpells(){

        $logger = new Logger();
        $this->assertEquals('<b> -- Striker has no spells.</b><br>', $logger->defenderHasNoSpells());
    }
}