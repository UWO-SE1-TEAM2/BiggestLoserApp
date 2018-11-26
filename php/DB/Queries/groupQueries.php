<?php
    function InsertGroupUser($name, $startDate){
        global $db;
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
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            db_disconnect();
            exit("aborting: There was a database error when retrieving groups.");
        }
    }

    function GetAllAdminForGroup($groupName){
        global $db;
        try {
            $query = "CALL GetAllAdminForGroup(?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$groupName]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when retrieving admin data.");
        }
    }

    function GetGroupsByUser($username){
        global $db;
        try {
            $query = "CALL GetUserByUsername(?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$username]);
            return $stmt-fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when retrieving group data.");
        }
    }

    function GetStartAndEndDateFromGroup($groupName)
    {
        global $db;
        try {
            $query = "CALL GetStartAndDateFromGroup(?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$username]);
            return $stmt-fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when retrieving group data.");
        }
    }
?>
