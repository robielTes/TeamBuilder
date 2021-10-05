<?php

require('model/Role.php');
require_once 'model/DB.php';

echo "\n>>>>> find role\n";
$role = Role::find(2);
$savename = $role->name;
var_dump($savename);
