<?php

class Hero extends Entity
{
    protected $spell;

    /**
     * @param string $spell
     */
    public function setSpell($spell) {

        Logger::learningSpell($this->name, $spell);

        switch($spell) {
            case 'rapid strike':
                Logger::spellDescriptionA();
                break;
            case 'magic shield':
                Logger::spellDescriptionB();
                break;
            default:
                echo 'No skill learned!';
        }
        $this->spell[] = $spell;
    }

    /**
     * @return array
     */
    public function getSpell() {
        return $this->spell;
    }

    public function setFirstStats() {
        $this->setHealth(rand(70, 100));
        $this->setStrength(rand(70, 80));
        $this->setDefence(rand(45, 55));
        $this->setSpeed(rand(40, 50));
        $this->setLuck(rand(10, 30));
        $this->setSpell('rapid strike');
        $this->setSpell('magic shield');
    }
}
