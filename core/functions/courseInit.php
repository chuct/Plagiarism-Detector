<?php
require_once realpath(dirname(__FILE__).'/../database/connect.php');
function course_Id_exists($course_Id) {
    global $mysqli;
    $course_Id = sanitize($course_Id);
    $result = $mysqli->query("SELECT count('ID_Courses') as 'numCourse_Ids' FROM tblCourses WHERE ID_Courses = '$course_Id'");
    $row = $result->fetch_object();
    return ($row->numCourse_Ids) ? true : false;
}

function courseIdMatch($userId, $course_Id) {
    require 'core/database/connect.php';
    global $mysqli;
    $result = $mysqli->query("SELECT count('ID_Teacher') as 'numCourses' FROM tblCourses WHERE ID_Courses = '$course_Id' AND ID_Teacher = '$userId'");
    $row = $result->fetch_object();
    return ($row->numCourses) ? true : false;
}

function find_course_name($courseId)
{
    require 'core/database/connect.php';
    $query = "SELECT * FROM tblCourses WHERE ID_Courses = '$courseId'";
    $result = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));
    $row = mysqli_fetch_array($result, MYSQLI_BOTH);
    return $row[2];
}
?>