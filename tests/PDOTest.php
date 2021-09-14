<?php

require('model/DB.php');

class PDOTest extends \PHPUnit\Framework\TestCase
{

    public function testSelectMany()
    {
        $this->assertNotNull(DB::selectMany("SELECT * FROM roles", []));
    }

    public function testSelectOne()
    {
        $this->assertNotNull(DB::selectOne("SELECT * FROM roles where slug = :slug", ["slug" => "MOD"]));
    }

    public function testInsert()
    {
        $this->assertIsInt(DB::insert("INSERT INTO roles(slug,name) VALUES (:slug, :name)", ["slug" => "XXX", "name" => "Slasher"]));
    }

    public function testUpdate()
    {
        $this->assertIsInt(DB::execute("UPDATE roles set name = :name WHERE slug = :slug", ["slug" => "XXX", "name" => "Correcteur"]));
    }

}