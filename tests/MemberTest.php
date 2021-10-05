<?php

require "model/Member.php";

use PHPUnit\Framework\TestCase;

class MemberTest extends TestCase
{
    /**
     * @covers Member::all()
     */
    public function testAll()
    {
        $this->assertEquals(51,count(Member::all()));
    }

    /**
     * @covers Member::find(id)
     */
    public function testFind()
    {
        $this->assertInstanceOf(Member::class,Member::find(1));
        $this->assertNull(Member::find(1000));
    }

    /**
     * @covers Member::where(criteria)
     */
    public function testWhere()
    {
        $this->assertEquals(5,count(Member::where("role_id",2)));
        $this->assertEquals(0,count(Member::where("role_id",222)));
    }

    /**
     * @covers $member->create()
     * @depends testAll
     */
    public function testCreate()
    {
        $member = Member::make(["name" => "XXX","password" => 'XXXPa$$w0rd', "role_id" => 1]);
        $this->assertTrue($member->create());
        $this->assertFalse($member->create());
    }

    /**
     * @covers $member->save()
     */
    public function testSave()
    {
        $member = Member::find(1);
        $savename = $member->name;
        $member->name = "newname";
        $this->assertTrue($member->save());
        $this->assertEquals("newname",Member::find(1)->name);
        $member->name = $savename;
        $member->save();
    }

    /**
     * @covers $member->save() doesn't allow duplicates
     */
    public function testSaveRejectsDuplicates()
    {
        $member = Member::find(1);
        $member->name = Member::find(2)->name;
        $this->assertFalse($member->save());
    }

    /**
     * @covers $member->delete()
     */
    public function testDelete()
    {
        $member = Member::find(1);
        $this->assertFalse($member->delete()); // expected to fail because of foreign key
        $member = Member::make(["name" => "dummy","password" => "dummy", "role_id" => 1]);
        $member->create(); // to get an id from the db
        $id = $member->id;
        $this->assertTrue($member->delete()); // expected to succeed
        $this->assertNull(Member::find($id)); // we should not find it back
    }

    /**
     * @covers Member::destroy(id)
     */
    public function testDestroy()
    {
        $this->assertFalse(Member::destroy(1)); // expected to fail because of foreign key
        $member = Member::make(["name" => "dummy","password" => "dummy", "role_id" => 1]);
        $member->create(); // to get an id from the db
        $id = $member->id;
        $this->assertTrue(Member::destroy($id)); // expected to succeed
        $this->assertNull(Member::find($id)); // we should not find it back
    }
}
