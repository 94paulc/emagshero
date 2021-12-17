<?php

class Beast extends Entity
{
    public function setFirstStats() {
        $this->setHealth(rand(60, 90));
        $this->setStrength(rand(60, 90));
        $this->setDefence(rand(40, 60));
        $this->setSpeed(rand(40, 60));
        $this->setLuck(rand(25, 40));
    }
}
