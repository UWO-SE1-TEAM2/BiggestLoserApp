<?php
    function InsertAdminToGroup($username, $group){
        global $db;
        try{
            $query = "INSERT INTO Admin VALUES (?, ?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$username, $group]);
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when inserting admin to group.");
        }
    }

    function DeleteAdminFromGroup($username, $group){
        global $db;
        try{
            $query = "DELETE FROM Admin WHERE Username = $username, Group = $group";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when deleteing admin from group.");
        }
    }
?>