<?php
/**
 * File : simpletest.php
 * Author : X. Carrel
 * Created : 14.09.21
 * Modified last :
 **/

require_once 'model/Member.php';
require_once 'model/DB.php';

echo "\n>>>>> Test selectMany:\n";
$member = Member::make(["name" => "XXX","password" => 'XXXPa$$w0rd', "role_id" => 1]);

$member = new Member();
$member->create();




