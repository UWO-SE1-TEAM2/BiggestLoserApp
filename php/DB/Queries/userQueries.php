<?php
    function InsertUser($username, $password){
        global $db;
        try{
            // $query = "INSERT INTO User VALUES (?, ?)";
            $query = "CALL InsertUser(?,?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$username, password_hash($password, PASSWORD_BCRYPT)]);
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when inserting user.");
        }
    }

    function DeleteUser($username){
        global $db;
        try{
            // $query = "DELETE FROM User WHERE username = $username";
            $query = "CALL DeleteUser(?)";
            $stmt = $db->prepare($query);
            $stmt->execute($username);
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when deleting user.");
        }
    }

    function UpdatePasswordForUser($password, $username){
        global $db;
        try{
            // $query = "UPDATE User SET Password = ?";
            $query = "CALL UpdatePasswordForUser(?, ?)";
            $stmt = $db->prepare($query);
			$stmt->execute([password_hash($password, PASSWORD_BCRYPT), $username]);
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when updating password.");
        }
    }

    function GetUserbyUsername($username){
        global $db;
        try{
            // $query = "SELECT * FROM User WHERE username = $username";
            $query = "CALL GetUserByUsername(?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$username]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when retrieving user.");
        }
    }

    function GetAllUsers(){
        global $db;
        try{
            // $query = "SELECT * FROM User";
            $query = "CALL GetAllUsers()";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when retrieving users.");
        }
    }

    function GetAllUsersFromGroup($groupName){
        global $db;
        try{
            $query = "CALL GetAllUsersFromGroup(?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$groupName]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when retrieving users.");
        }
    }
?>
