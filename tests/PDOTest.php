<?php


use PHPUnit\Framework\TestCase;

require 'model/DB.php';

class PDOTest extends TestCase
{
    public function testSelectMany()
    {
        $this->assertNotNull(DB::selectMany("SELECT * FROM roles", []));
        $this->assertEquals(DB::selectMany("SELECT * FROM roles", []),
            [
                ['id'=>'1','slug'=>'MEM','name'=>'Member'],
                ['id'=>'2','slug'=>'MOD','name'=>'Moderator'],
                ['id'=>'3','slug'=>'XXX','name'=>'Correcteur']
            ]
        );
    }

    public function testSelectOne()
    {
        $this->assertNotNull(DB::selectOne("SELECT * FROM roles where slug = :slug", ["slug" => "MOD"]));
    }

    public function testInsert()
    {
        $this->assertNotEquals(DB::insert("INSERT INTO roles(slug,name) VALUES (:slug, :name)", ["slug" => "XXX", "name" => "Slasher"]),0);
    }

    public function testUpdate()
    {
        $this->assertNotEquals(DB::execute("UPDATE roles set name = :name WHERE slug = :slug", ["slug" => "XXX", "name" => "Correcteur"]),0);
    }
}
