<?php

    function GetPlaces() {
        global $mysqli;
        
        $places = array();
        
        $query = "
            SELECT * 
            FROM `places` 
            ORDER BY `place_name`
        ";
        
        $result = $mysqli->query($query);
        $num_results = $result->num_rows;
        
        for ($i = 0; $i < $num_results; $i++) {
            $places[] = $result->fetch_assoc();
        }
        
        return $places;
    }
    function GetPlaceByID($place_id) {
        global $mysqli;
        
        $query = "
            SELECT * 
            FROM `places` 
            WHERE `place_id`=$place_id
        ";
        
        $result = $mysqli->query($query);
        if ($result->num_rows) {
            return $result->fetch_assoc();
        }
        
        return false;
    }
    
    function CreatePlace($data) {
        global $mysqli;
        
        $place_name = $data['place_name'];
        
        $query = "
            INSERT INTO `places`
            SET `place_name`='$place_name',
        ";
        
        $result = $mysqli->query($query);
        $place_id = $mysqli->insert_id;
        $place = GetPlaceByID($place_id);
        
        return $place;
    }
    
    function UpdatePlace($data) {
        global $mysqli;
        
        $place_name = $data['place_name'];
        
        $query = "
            UPDATE `places`
            SET `place_name`='$place_name',
        ";
        
        $result = $mysqli->query($query);
        $place = GetPlaceByID($place_id);
        
        return $place;
    }
    
    function DeletePlace($place_id) {
        global $mysqli;
        
        $query = "
            DELETE FROM `places` 
            WHERE `place_id`=$place_id
        ";
        
        $result = $mysqli->query($query);
    }
?>