<?php
    function InsertUserIntoGroup($username, $groupName){
        global $db;
        try{
            // $query = "INSERT INTO UserInGroup VALUES (?, ?)";
            $query = "CALL InsertUserIntoGroup(?,?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$username, $groupName]);
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when inserting into UserInGroup Table.");
        }
    }

    function DeleteUserFromGroup($username, $groupName){
        global $db;
        try{
            // $query = "DELETE FROM UserInGroup WHERE Username = ?, GroupName = ?";
            $query = "Call DeleteUserFromGroup(?,?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$username, $groupName]);
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when deleting from UserInGroup Table.");
        }
    }
?>
