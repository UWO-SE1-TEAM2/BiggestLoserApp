<?php

use PHPUnit\Framework\TestCase;

class UserInGroupTest extends TestCase
{
    public function testValidInsertUserInGroup()
    {
        InsertUser("unitTest", "test");
        InsertGroupUser("unitTest", "2000-01-01");
        $this->assertTrue(InsertUserIntoGroup("unitTest", "unitTest"));
        DeleteUserFromGroup("unitTest, unitTest");
        DeleteUser("unitTest");
        // Please manually delete group from db after test
    }

    public function testValidDeleteUserFromGroup()
    {
        InsertUser("unitTest", "test");
        InsertGroupUser("unitTest2", "2000-01-01");
        InsertUserIntoGroup("unitTest", "unitTest2");
        $this->assertTrue(DeleteUserFromGroup("unitTest", "unitTest2"));
        DeleteUser("unitTest");
        // Please manually delete group from db after test
    }

    public function testInsertDuplicateUserInGroup()
    {
        InsertUser("unitTest", "test");
        InsertGroupUser("unitTest3", "2000-01-01");
        InsertUserIntoGroup("unitTest", "unitTest3");
        InsertUserIntoGroup("unitTest", "unitTest3");
        $this->expectException();
        DeleteUserFromGroup("unitTest, unitTest3");
        DeleteUser("unitTest");
        // Please manually delete group from db after test
    }

    public function testInsertNonExistantUserInGroup()
    {
        InsertGroupUser("unitTest4", "2000-01-01");
        InsertUserIntoGroup("NonExistantUnitTest", "unitTest4");
        $this->expectException();
        // Please manually delete group from db after test
    }

    public function testInsertUserInNonExistantGroup()
    {
        InsertUser("unitTest", "test");
        InsertUserIntoGroup("unitTest", "NonExistantUnitTest");
        $this->expectException();
        DeleteUser("unitTest");
    }

    public function testInsertNonExistantUserInNonExistantGroup()
    {
        InsertUserIntoGroup("NonExistantUnitTest", "NonExistantUnitTest");
        $this->expectException();
    }

    public function testInsertNullUserInGroup()
    {
        InsertGroupUser("unitTest5", "2000-01-01");
        InsertUserIntoGroup(null, "unitTest5");
        $this->expectException();
        // Please manually delete group from db after test
    }

    public function testInsertUserInNullGroup()
    {
        InsertUser("unitTest", "test");
        InsertUserIntoGroup("unitTest", null);
        $this->expectException();
        DeleteUser("unitTest");
    }

    public function testInsertNullUserInNullGroup()
    {
        InsertUserIntoGroup(null, null);
        $this->expectException();
    }

    public function testDeleteNonExistantUserFromGroup()
    {
        InsertGroupUser("unitTest6", "2000-01-01");
        DeleteUserFromGroup("NonExistantUnitTest", "unitTest6");
        $this->expectException();
        // Please manually delete group from db after test
    }

    public function testDeleteUserFromNonExistantGroup()
    {
        InsertUser("unitTest", "test");
        DeleteUserFromGroup("unitTest", "NonExistantUnitTest");
        $this->expectException();
        DeleteUser("unitTest");
    }

    public function testDeleteNonExistantUserFromNonExistantGroup()
    {
        DeleteUserFromGroup("NonExistantUnitTest", "NonExistantUnitTest");
        $this->expectException();
    }

    public function testDeleteNullUserFromGroup()
    {
        InsertGroupUser("unitTest7", "2000-01-01");
        DeleteUserFromGroup(null, "unitTest7");
        $this->expectException();
        // Please manually delete group from db after test
    }

    public function testDeleteUserFromNullGroup()
    {
        InsertUser("unitTest", "test");
        DeleteUserFromGroup("unitTest", null);
        $this->expectException();
        DeleteUser("unitTest");
    }

    public function testDeleteNullUserFromNullGroup()
    {
        DeleteUserFromGroup(null, null);
        $this->expectException();
    }
}