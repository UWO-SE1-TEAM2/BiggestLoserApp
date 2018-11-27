<?php

use PHPUnit\Framework\TestCase;

class WeightTest extends TestCase
{
    public function testValidWeight()
    {
        InsertUser("unitTest", "test");
        $this->assertTrue(InsertWeight("unitTest", 150, "2000-01-01"));
        DeleteUser("unitTest");
        // Please manually delete weight from db after test
    }

    public function testNonExistantUsername()
    {
        InsertWeight("nonExistantUser", 150, "2000-01-01");
        $this->expectException();
    }

    public function testNullUser()
    {
        InsertWeight(null, 150, "2000-01-01");
        $this->expectException();
    }

    public function testNullWeight()
    {
        InsertUser("unitTest", "test");
        InsertWeight("unitTest", null, "2000-01-01");
        $this->expectException();
        DeleteUser("unitTest");
    }

    public function testNullDate()
    {
        InsertUser("unitTest", "test");
        InsertWeight("unitTest", 150, null);
        $this->expectException();
        DeleteUser("unitTest");
    }
}