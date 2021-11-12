<?php

require "model/State.php";

$state = State::make(["slug" => "ACTIF","name" => 'Actif']);
$state->create();
$state = State::make(["slug" => "INACTIF","name" => 'Inactif']);
$state->create();
$state = State::make(["slug" => "BANNI","name" => 'Banni']);
$state->create();