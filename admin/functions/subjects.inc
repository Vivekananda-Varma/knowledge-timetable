<?php

    function GetSubjects() {
        global $mysqli;
        
        $subjects = array();
        
        $query = "
            SELECT * 
            FROM `subjects` 
            ORDER BY `subject_name`
        ";
        
        $result = $mysqli->query($query);
        $num_results = $result->num_rows;
        
        for ($i = 0; $i < $num_results; $i++) {
            $subjects[] = $result->fetch_assoc();
        }
        
        return $subjects;
    }
    
    function GetSubjectByID($subject_id) {
        global $mysqli;
        
        $query = "
            SELECT * 
            FROM `subjects` 
            WHERE `subject_id`=$subject_id
        ";
        
        $result = $mysqli->query($query);
        if ($result->num_rows) {
            return $result->fetch_assoc();
        }
        
        return false;
    }
    
    function CreateSubject($data) {
        global $mysqli;
        
        $subject_name = $data['subject_name'];
        $category_id = $data['category_id'];
        $is_academic = $data['is_academic'];
        
        $query = "
            INSERT INTO `subjects`
            SET `category_id`='$category_id',
                `subject_name`='$subject_name',
                `is_academic`=$is_academic
        ";
        
        $result = $mysqli->query($query);
        $subject_id = $mysqli->insert_id;
        $subject = GetSubjectByID($subject_id);
        
        return $subject;
    }
    
    function UpdateSubject($data) {
        global $mysqli;
        
        $subject_name = $data['subject_name'];
        $category_id = $data['category_id'];
        $is_academic = $data['is_academic'];
        
        $query = "
            UPDATE `subjects`
            SET `category_id`='$category_id',
                `subject_name`='$subject_name',
                `is_academic`=$is_academic
        ";
        
        $result = $mysqli->query($query);
        $category = GetSubjectByID($subject_id);
        
        return $subject;
    }
    
    function DeleteSubject($subject_id) {
        global $mysqli;
        
        $query = "
            DELETE FROM `subjects` 
            WHERE `subject_id`=$subject_id
        ";
        
        $result = $mysqli->query($query);
    }

?>