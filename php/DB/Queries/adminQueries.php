<?php
    function InsertAdminToGroup($username, $groupName){
        global $db;
        // try{
        //     $query = "INSERT INTO Admin VALUES (?, ?)";
        //     $stmt = $db->prepare($query);
        //     $stmt->execute('call ');
        //     return true;
        // } catch (PDOException $e){
        //     db_disconnect();
        //     exit("Aborting: There was a database error when inserting admin to group.");
        // }
        try {
            $query = "CALL InsertAdminToGroup(?, ?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$username, $groupName])
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when inserting admin to group.");
    }
    }

    function DeleteAdminFromGroup($username, $groupName){
        global $db;
        // try{
        //     $query = "DELETE FROM Admin WHERE Username = $username AND GroupName = $groupName";
        //     $stmt = $db->prepare($query);
        //     $stmt->execute();
        //     return true;
        // } catch (PDOException $e){
        //     db_disconnect();
        //     exit("Aborting: There was a database error when deleteing admin from group.");
        // }
        try {
            $query = "CALL DeleteAdminFromGroup(?,?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$username, $groupName]);
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when deleteing admin from group.");
        }
    }
?>