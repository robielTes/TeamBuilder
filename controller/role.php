<?php

require('model/Role.php');

echo "\n>>>>> find role\n";
$role = Role::find(2);
$savename = $role->name;
var_dump($savename);
