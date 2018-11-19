<?php
    function InsertGroupUser($name, $startDate){
        global $db;
        // try{
        //     $query = "INSERT INTO Group VALUES (?)";
        //     $stmt = $db->prepare($query);
        //     $stmt->execute([$name]);
        //     return true;
        // } catch (PDOException $e){
        //     db_disconnect();
        //     exit("Aborting: There was a database error when inserting group.");
        // }
        try{
            $query = "CALL InsertGroupUser(?, ?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$name, $startDate]);
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when inserting group.");
        }
    }

    function ArchiveGroupUser($name){
        global $db;
        try{
            // $query = "UPDATE Group SET IsArchived = 1 WHERE Name = $name";
            $query = "CALL ArchiveGroupUser(?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$name]);
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when archiving group.");
        }
    }

    function UpdateGroup($name, $winner, $endDate, $isArchived){
        global $db;
        try{
            // $query = "UPDATE Group SET Name = ?, Winner = ?, EndDate = ?, IsArchived = ?";
            $query = "CALL UpdateGroupUser(?,?,?,?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$name, $winner, $endDate, $isArchived]);
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when updating group.");
        }
    }

    function GetAllGroups(){
        global $db;
        try{
            // $query = "SELECT * FROM Group";
            $query = "CALL GetAllGroups()";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e){
            db_disconnect();
            exit("aborting: There was a database error when retrieving groups.");
        }
    }
?>
