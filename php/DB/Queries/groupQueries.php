<?php
    function InsertGroup($name){
        global $db;
        try{
            $query = "INSERT INTO Group VALUES (?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$name]);
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when inserting group.");
        }
    }

    function ArchiveGroup($name){
        global $db;
        try{
            $query = "UPDATE Group SET IsArchived = 1 WHERE Name = $name";
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
            $query = "UPDATE Group SET Name = ?, Winner = ?, EndDate = ?, IsArchived = ?";
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
            $query = "SELECT * FROM Group";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e){
            db_disconnect();
            exit9"aborting: There was a database error when retrieving groups.");
        }
    }
?>