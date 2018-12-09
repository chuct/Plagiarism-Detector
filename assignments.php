<?php 
include 'core/init.php';
include 'includes/full/header.php';
$username = $_COOKIE["Username"];
$password = $_COOKIE["Password"];
$courseId = $_GET["courseId"];
$assnId = $_GET["assnId"];

if (!empty($username) && !empty($password))
{
    if (auth($username, $password))
    {
        $userId = find_id($username, $password);
        if (courseIdMatch($userId, $courseId))
        {
            $query = "SELECT Course_Name FROM tblCourses
            WHERE ID_Courses = '$courseId' LIMIT 1";
            
            
            $result = mysqli_query($mysqli, $query);
            while ($row = mysqli_fetch_array($result))
            {
                $courseName = $row['Course_Name'];
            }
            
            echo "<h2>Assignment list for " . $courseName . "</h2><br>"; 
            
            
            
            $query = "SELECT * FROM tblAssignments WHERE ID_Courses = '$courseId'"; 
            $result = mysqli_query($mysqli, $query);
            
            
            
            echo "<table border = 1>
            <tr>
            <th>Assignment</th>
            <th>Due Date</th>
            <th>Creation Date</th>
            <th>Email 
            </tr>";
            while ($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                // echo "<td class='courseTd'><a href='assignments.php?courseId=" . $row['ID_Courses'] . "' >" . $row['Course_Name'] . "</a></td>";
                echo "<td><a href='assignmentDashboard.php?courseId=" . $row['ID_Courses'] . "&assnId=" . $row    ['ID_Assignments'] . "'>" . $row['Assignment_Name'] . "</a></td>";
                echo "<td>" . $row['Assignment_Deadline'] . "</td>";
                echo "<td>" . $row['Assignment_Creation'] . "</td>";
                echo "<td> <label class='textLink'><a href='emailtostudents.php?courseId=" . $row['ID_Courses'] . "&assnId=" .$row['ID_Assignments'] . "'>Email this assignment to your students</a></label> </td>";
                // Except I dont know how
                echo "</tr>";
            
            }
            echo "</table>";
        } else {
            header('Location: wrongpage.php');
        }
    }
}

include 'includes/full/footer.php';
?>