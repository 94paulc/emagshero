<?php

class Logger
{
    /**
     * Log the game info
     *
     * @param object $game
     */
    public function endBattle($striker, $defender) {
        echo '<b>' . $defender . '</b> lost the fight!<br>';
        echo '<b>' . $striker . '</b> is the winner!';
    }

    /**
     * Log the game info
     */
    public function noWinners() {
        echo 'END GAME. No winners.';
    }

    /**
     * Log the game info
     *
     * @param object $striker
     * @param integer $damage
     */
    public function strikerInfo($striker, $damage) {
        echo 'Striker: <b>' . $striker->getName() . '<br></b>';
        echo 'attacks with the damage: <b>'.$damage.'</b><br>';
    }

    /**
     * Log the game info
     *
     * @param object $defender
     * @param integer $health
     */
    public function defenderInfo($defender, $health) {
        echo 'Defender: <b>' . $defender->getName() . '</b><br>';
        echo 'Defenders health before damage taken: <b>' . $health. '</b><br>';
    }


    /**
     * Log the game info
     *
     * @param integer $health
     */
    public function defenderInfoAfterDamageTaken($health) {
        echo 'Defenders health after damage taken: <b>' . $health. '</b><br><br>';
    }

    /**
     * Log the game info
     */
    public function strikerHasNoSpells() {
        echo '<b> -- Striker has no spells.</b><br>';
    }

    /**
     * Log the game info
     */
    public function defenderHasNoSpells() {
        echo '<b> -- Defender has no spells.</b><br>';
    }


    /**
     * Log the game info
     *
     * @param float|int $damage
     */
    public function strikerHitDoubleDamage($damage) {
        echo '<b> ** Striker hit double damage - Strikers damage: ' . $damage . '</b><br>';
    }

    /**
     * Log the game info
     *
     * @param float|int $damage
     */
    public function defenderBlockedHalfDamage($damage) {
        echo '<b> ** Defender blocked half damage - Strikers damage: ' . $damage . '</b><br>';
    }

    /**
     * Log the game info
     */
    public function defenderBlockedFullDamage() {
        echo '<b> !! Defender blocked whole damage - Strikers damage: 0</b><br>';
    }

    /**
     * Log the game info
     */
    public function spellDescriptionA() {
        echo 'Rapid strike: Strike twice while it’s his turn to attack; there’s a 10% chance he’ll use this skill
every time he attacks. <br><br>';
    }

    /**
     * Log the game info
     */
    public function spellDescriptionB() {
        echo 'Magic shield: Takes only half of the usual damage when an enemy attacks; there’s a 20%
change he’ll use this skill every time he defends.<br><br>';
    }

    /**
     * Log the game info
     */
    public function learningSpell($name, $spell) {
        echo $name . ' learned <b>' . $spell . '</b><br>';
    }

    /**
     * Log the game info
     */
    public function beginTheBattle($heroName, $beastName) {
        echo 'The battle will be between <b>' . $heroName . '</b> and <b>' . $beastName . '</b><br><br>';
    }
}