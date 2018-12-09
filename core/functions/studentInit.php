<?php
require_once realpath(dirname(__FILE__).'/../database/connect.php');
function student_exists($studentId) {
    global $mysqli;
    $studentId = sanitize($studentId);
    $result = $mysqli->query("SELECT count('ID_Students') FROM tblStudents WHERE ID_Students = '$studentId'");
    $row = mysqli_fetch_row($result);
    return ($row[0]) ? true : false;
}
?>