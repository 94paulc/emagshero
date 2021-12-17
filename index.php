<?php

require_once('includes/autoload.php');

echo 'Let the battle begin! <br><br>';

$hero = new Hero();
$hero->setName('Orderus');

$beast = new Beast();
$beast->setName('Wild beast');

$game = new Game($hero, $beast);
$game->beginBattle();



