<?php

class Game
{
    public $hero;
    public $beast;

    public $gameRunning = true;
    public $counterFights = 0;

    public function __construct(Hero $hero, Beast $beast)
    {
        $this->hero = $hero;
        $this->beast = $beast;
    }

    /**
     * Begin the battle
     */
    public function beginBattle() {

        Logger::beginTheBattle($this->hero->getName(), $this->beast->getName());

        $this->hero->setFirstStats();
        $this->beast->setFirstStats();

        $game = $this->getPlayerStats();

        while($this->gameRunning) {

            $game = $this->fight($game);

            $this->gameRunning = $this->verifyIfGameIsStillRunning($game);

            $game = $this->roleSwitching($game['striker'], $game['defender']);

            $this->counterFights++;
        }

    }

    /**
     * Striker attacks the defender
     *
     * @param $game
     * @return mixed
     */
    public function fight($game) {

        $damage = $game['striker']->getStrength() - $game['defender']->getDefence();

        Logger::strikerInfo($game['striker'], $damage);

        $damage = $this->strikerHasDoubleDamage($game['striker'], $damage);

        Logger::defenderInfo($game['defender'], $game['defender']->getHealth());

        if($this->defenderIsLucky($game['defender'])){
            $damage = 0;
        } else {
            $damage = $this->defenderBlocksHalfDamage($game['defender'], $damage);
        }

        $actualHealth = $game['defender']->getHealth() - $damage;
        $game['defender']->setHealth($actualHealth);

        Logger::defenderInfoAfterDamageTaken($game['defender']->getHealth());

        return $game;
    }

    /**
     * Defender is lucky and block all the incoming damage
     *
     * @param object $defender
     * @param float|int $damage
     */
    public function defenderIsLucky($defender) {
        if(rand(1, 100) <= $defender->getLuck()) {
            Logger::defenderBlockedFullDamage();
            return true;
        }
        return false;
    }

    /**
     * Striker got double damage
     *
     * @param object $striker
     * @param float|int $damage
     * @return float|int
     */
    public function strikerHasDoubleDamage($striker, $damage) {
        try {
            // Striker has rapid strike as spell
            if($striker->getSpell() && in_array('rapid strike', $striker->getSpell())) {
                // Striker has 10% chance to hit rapid striker - double damage
                if(rand(1, 100) <= 10) {
                    $damage = $damage * 2;
                    Logger::strikerHitDoubleDamage($damage);
                    return $damage;
                }
            }
        } catch (Error $e) {
            Logger::strikerHasNoSpells();
        }

        return $damage;
    }

    /**
     * Defender blocks half of the strikers damage
     *
     * @param object $defender
     * @param float|int $damage
     * @return float|int
     */
    public function defenderBlocksHalfDamage($defender, $damage) {
        try {
            // Defender has magic shield as spell
            if($defender->getSpell() && in_array('magic shield', $defender->getSpell())) {
                // Defender has 20% chance to block half damage
                if(rand(1, 100) <= 20) {
                    $damage = $damage / 2;
                    Logger::defenderBlockedHalfDamage($damage);
                    return $damage;
                }
            }
        } catch (Error $e) {
            Logger::defenderHasNoSpells();
        }

        return $damage;
    }

    /**
     * Verify if the game is still running
     *
     * It will stop if
     * - defender get 0 hp
     * - there are over 20 fights
     *
     * @param $game
     * @return bool
     */
    public function verifyIfGameIsStillRunning($game) {

        if($game['defender']->getHealth() <= 0) {
            Logger::endBattle($game['striker']->getName(), $game['defender']->getName());
            return false;
        }

        if($this->counterFights >= 19) {
            Logger::noWinners();
            return false;
        }

        return true;
    }

    /**
     * Get the striker and the defender
     *
     * @return array
     */
    public function getPlayerStats() {

        // The hero has higher speed than wild beast
        if($this->hero->getSpeed() > $this->beast->getSpeed()) {
            return $this->setHeroAsStriker(true);
        // The wild beast has higher speed than hero
        } else if($this->beast->getSpeed() > $this->hero->getSpeed()) {
            return $this->setHeroAsStriker(false);
        // The hero and wild beast have the same speed
        } else {
            // The hero has higher luck than wild beast
            if($this->hero->getLuck() > $this->beast->getLuck()) {
                return $this->setHeroAsStriker(true);
                // The wild beast has higher luck than hero
            } else {
                return $this->setHeroAsStriker(false);
            }
        }
    }

    /**
     * Set the striker and the defender
     *
     * @param bool $isHeroStriker
     * @return array
     */
    public function setHeroAsStriker($isHeroStriker) {

        if($isHeroStriker) {
            return [
                'striker' => $this->hero,
                'defender' => $this->beast
            ];
        } else {
            return [
                'striker' => $this->beast,
                'defender' => $this->hero
            ];
        }
    }

    /**
     * Switch the roles
     * Striker will be defender and defender will be the striker
     *
     * @param object $striker
     * @param object $defender
     * @return array
     */
    public function roleSwitching($striker, $defender) {
        return [
            'striker' => $defender,
            'defender' => $striker
        ];
    }
}