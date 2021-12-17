<?php

abstract class Entity
{
    protected $name;

    protected $health;
    protected $strength;
    protected $defence;
    protected $speed;
    protected $luck;

    /**
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param integer $name
     */
    public function setHealth($health) {
        $this->health = ($health > 0) ? $health : 0;
        return $this->health;
    }

    /**
     * @return integer
     */
    public function getHealth() {
        return $this->health;
    }

    /**
     * @param integer $strength
     */
    public function setStrength($strength) {
        $this->strength = $strength;
    }

    /**
     * @return integer
     */
    public function getStrength() {
        return $this->strength;
    }

    /**
     * @param integer $defence
     */
    public function setDefence($defence) {
        $this->defence = $defence;
    }

    /**
     * @return integer
     */
    public function getDefence() {
        return $this->defence;
    }

    /**
     * @param integer $speed
     */
    public function setSpeed($speed) {
        $this->speed = $speed;
    }

    /**
     * @return integer
     */
    public function getSpeed() {
        return $this->speed;
    }

    /**
     * @param integer $luck
     */
    public function setLuck($luck) {
        $this->luck = $luck;
    }

    /**
     * @return integer
     */
    public function getLuck() {
        return $this->luck;
    }
}
