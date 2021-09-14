<?php
/**
 * File : simpletest.php
 * Author : X. Carrel
 * Created : 14.09.21
 * Modified last :
 **/

require('model/DB.php');
echo "\n>>>>> Test selectMany:\n";
$res = DB::selectMany("SELECT * FROM roles", []);
var_dump($res);

echo "\n>>>>> Test selectOne:\n";
$res = DB::selectOne("SELECT * FROM roles where slug = :slug", ["slug" => "MOD"]);
var_dump($res);

echo "\n>>>>> Test insert:\n";
$res = DB::insert("INSERT INTO roles(slug,name) VALUES (:slug, :name)", ["slug" => "XXX", "name" => "Slasher"]);
var_dump($res);

echo "\n>>>>> Test update:\n";
$res = DB::execute("UPDATE roles set name = :name WHERE slug = :slug", ["slug" => "XXX", "name" => "Correcteur"]);
var_dump($res);

echo "\nDone\n";
