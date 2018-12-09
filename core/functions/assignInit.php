<?php
include_once '../database/connect.php';
include_once 'general.php';

function find_assignment_id($courseId) {
    require 'core/database/connect.php';
    // if authenticate
    
        $query = "SELECT ID_Assignments FROM tblAssignments WHERE ID_Courses = '$courseId'";
        $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
        $row = mysqli_fetch_array($result, MYSQLI_NUM);
        return $row[0];
    
}
?>