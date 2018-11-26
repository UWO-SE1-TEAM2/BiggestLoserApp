<?php

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    // private $db;

    // protected function getConnection()
    // {
    //     try 
    //     {
    //         $db = new PDO("mysql:dbname=SWTeam2;host=localhost", "SWTeam2", "j670", 
    //         array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    //     } 
    //     catch (PDOException $ex) 
    //     {
    //         die("Unable to connect to database.");
    //     }
    // }

    // public function InsertUser($username, $password){
    //     try{
    //         // $query = "INSERT INTO User VALUES (?, ?)";
    //         $query = "CALL InsertUser(?,?)";
    //         $stmt = $db->prepare($query);
    //         $stmt->execute([$username, password_hash($password, PASSWORD_BCRYPT)]);
    //         return true;
    //     } catch (PDOException $e){
    //         db_disconnect();
    //         exit("Aborting: There was a database error when inserting user.");
    //     }
    // }

    // public function DeleteUser($username){
    //     try{
    //         // $query = "DELETE FROM User WHERE username = $username";
    //         $query = "CALL DeleteUser(?)";
    //         $stmt = $db->prepare($query);
    //         $stmt->execute();
    //         return true;
    //     } catch (PDOException $e){
    //         db_disconnect();
    //         exit("Aborting: There was a database error when deleting user.");
    //     }
    // }

    public function testCreateNewUser()
    {   
        // $this->getConnection();
        // $this->assertTrue($this->InsertUser("unitTest", "test"));
        $this->assertTrue(InsertUser("unitTest", "test"));
    }

    public function testDeleteUser()
    {
        // $this->getConnection();
        // $this->assertTrue($this->DeleteUser("unitTest"));
        $this->assertTrue(DeleteUser("unitTest"));
    }
}