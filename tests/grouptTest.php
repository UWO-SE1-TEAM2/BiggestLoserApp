<?php

use PHPUnit\Framework\TestCase;

class GroupTest extends TestCase
{
    public function testValidGroup()
    {
        $this->assertTrue(InsertGroupUser("unitTest", "2018-11-25"));
        //please manually delete group from db after test
    }

    public function testDuplicateGroup()
    {
        InsertGroupUser("unitTest", "2018-11-25");
        $this->expectException();
    }

    public function testGroupLength()
    {
        InsertGroupUser("testingTheLengthOfANameForGroupUser", "2018-11-25");
        $this->expectException();
    }

    public function testNullGroup()
    {
        InsertGroupUser(null, "2018-11-25");
        $this->expectException(); 
    }

    public function testNullDate()
    {
        InsertGroupUser("unitTest2", null);
        $this->expectException();
        //please manually delete group from db after test
    }

    public function testGroupWithDateTime()
    {
        $this->assertTrue("unitTest3", "2018-11-25 20:20");
        //please manually delete group from db after test
    }

    public function testUpdateValid()
    {
        InsertUser("unitTest", "test");
        $this->assertTrue(UpdateGroup("unitTest", "unitTest", "2018-11-25", 0));
        DeleteUser("unitTest");
    }

    public function testUpdateNullGroup()
    {
        InsertUser("unitTest", "test");
        UpdateGroup(null, "unitTest", "2018-11-25", 0);
        $this->expectException();
        DeleteUser("unitTest");
    }

    public function testUpdateNullWinner()
    {
        InsertUser("unitTest", "test");
        $this->assertTrue(UpdateGroup("unitTest", null, "2018-11-25", 0));
        DeleteUser("unitTest");
    }

    public function testUpdateNullStartDate()
    {
        InsertUser("unitTest", "test");
        UpdateGroup("unitTest", "unitTest", null, 0);
        $this->expectException();
        DeleteUser("unitTest");
    }

    public function testUpdateNullArchive()
    {
        InsertUser("unitTest", "test");
        UpdateGroup("unitTest", "unitTest", "2018-11-25", null);
        $this->expectException();
        DeleteUser("unitTest");
    }

    public function testArchiveGroupUser()
    {
        $this->assertTrue(ArchiveGroupUser("UnitTest"));
    }
}