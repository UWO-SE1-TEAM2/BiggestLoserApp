<?php

use PHPUnit\Framework\TestCase;

class AdminTest extends TestCase
{
    public function testValidAdmin()
    {
        InsertUser("unitTest", "test");
        InsertGroupUser("groupTest");
        $this->assertTrue(InsertAdminToGroup("unitTest", "groupTest"));
        DeleteAdminFromGroup("unitTest", "groupTest");
        ArchiveGroupUser("groupTest");
    }

    public function testNonExistantUsername()
    {
        InsertAdminToGroup("nonExistantUser", "groupTest");
        $this->expectException();
    }

    public function testNonExistantGroup()
    {
        InsertUser("unitTest", "test");
        InsertAdminToGroup("unitTest", "invalidnonExistantGroup");
        $this->expectException();
        DeleteUser("unitTest");
    }

    public function testNullAdmin()
    {
        InsertAdminToGroup(null, "groupTest");
        $this->expectException();
    }

    public function testNullGroup()
    {
        InsertUser("unitTest", "test");
        InsertAdminToGroup("unitTest", "test");
        $this->expectException();
        DeleteUser("unitTest");
    }

    public function testDuplicateAdmin()
    {
        InsertUser("unitTest", "test");
        InsertAdminToGroup("unitTest", "groupTest");
        InsertAdminToGroup("unitTest", "groupTest");
        $this->expectException();
        DeleteUser("unitTest");
        DeleteAdminFromGroup("unitTest", "groupTest");
    }
}