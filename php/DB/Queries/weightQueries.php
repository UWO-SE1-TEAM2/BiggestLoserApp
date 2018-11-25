<?php
    function InsertWeight($username, $weight, $date){
        global $db;
        try{
            // $query = "INSERT INTO User VALUES (?, ?)";
            $query = "CALL InsertWeight(?,?,?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$username, $weight, $date]);
            return true;
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when inserting weight.");
        }
    }

    function GetCurrentWeightOfUser($username){
        global $db;
        try{
            // $query = "INSERT INTO User VALUES (?, ?)";
            $query = "CALL GetCurrentWeightOfUser(?)";
            $stmt = $db->prepare($query);
            $stmt->execute([$username]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when retrieving weight.");
        }
    }

    function GetAllUsersWithWeightLossInGroup($groupName, $endDate, $startDate){
        global $db;
        try{
            $query = "CALL GetAllUsersWithWeightLossInGroup(?,?,?)";
            $stmt = $db->perpare($query);
            $stmt->execute([$groupName, $endDate, $startDate]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e){
            db_disconnect();
            exit("Aborting: There was a database error when retrieving data.");
        }
    }
?>