<?php 
include 'core/init.php';

$username = $_COOKIE["Username"];
$password = $_COOKIE["Password"];
include 'includes/full/header.php';
#echo "<body>";

if (isset($username) && isset($password))
{
    if (auth($username, $password)) // --> users.php
    {
        $teacherId = find_id($username, $password);
        
                
        $query = "SELECT First_Name, Last_Name FROM tblUsers
        WHERE ID_Teacher = '$teacherId' LIMIT 1";
        
        
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result))
        {
            $fname = $row['First_Name'];
            $lname = $row['Last_Name'];
        }
        
        echo "<h2>Course List for  " . $fname . " " . $lname . "</h2><br>"; 
        
        
        $query = "SELECT * FROM tblCourses WHERE ID_Teacher = '$teacherId'";
        $result = mysqli_query($mysqli, $query);
        echo "<table border = 1>
        <tr>
        <th>Course Name</th>";
        //<th>Students</th>
        
        echo "<th>Created</th>
        </tr>";
        while ($row = mysqli_fetch_array($result))
        {
            $studentCountResult = 0;
            echo "<tr>";
            $courseId = $row['ID_Courses'];
            echo "<td class='courseTd'><a href='assignments.php?courseId=" . $row['ID_Courses'] . "' >" . $row['Course_Name'] . "</a></td>";
           
            /*$studentCountQuery = "SELECT COUNT('ID_Students') FROM tblStudents WHERE ID_Courses = '$courseId'";
            $studentCountResult = mysqli_query($mysqli, $studentCountQuery) or die();
            
            echo "<td>" . $studentCountResult . "</td>" ;*/
            echo "<td>" . $row['Course_Creation_DateTime'] . "</td>";

            echo "<td class='dataBox'><a class ='createAssnButton' href='newassignment.php?courseId=" . $row['ID_Courses'] . "'>Create Assignment for this course</a></td>";
            echo "<td class='dataBox'><a class='studButton' href='students.php?courseId=" . $row['ID_Courses'] . "'>Students</a></td>";
            // need to find out how to pass specific course as parameter to the assignment creation page
        }   
        echo "</table>";
    }
}
echo "<label class='textLink'><a href='newcourse.php'>New course?</a></label>";
#include "newcourse.php";
echo "</body>";
include "includes/full/footer.php"
?>