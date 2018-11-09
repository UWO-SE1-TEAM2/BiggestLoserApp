<?php
    function InsertUser($username, $password){
        global $db;
        try{
            $query = "INSERT INTO User VALUES (?, ?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$username, $password]);
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when inserting user.");
        }
    }

    function DeleteUser($username){
        global $db;
        try{
            $query = "DELETE FROM User WHERE username = $username";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when deleting user.");
        }
    }

    function UpdatePasswordForUser($password){
        global $db;
        try{
            $query = "UPDATE User SET Password = ?";
            $stmt = $db->prepare($query);
            $stmt->execute([$password]);
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when updating password.");
        }
    }

    function GetUserbyUsername($username){
        global $db;
        try{
            $query = "SELECT * FROM User WHERE username = $username";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch(PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when retrieving user.");
        }
    }

    function GetAllUsers(){
        global $db;
        try{
            $query = "SELECT * FROM User";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch(PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when retrieving users.");
        }
    }
?>