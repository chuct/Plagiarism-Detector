<?php
include 'core/init.php';
include 'includes/full/header.php';

$username = $_COOKIE["Username"];
$password = $_COOKIE["Password"];

$courseId = $_GET["courseId"];
$courseName = find_course_name($courseId);
$newStudentLast = $_POST['lastName'];
$newStudentFirst = $_POST['firstName'];
$newStudentEmail = $_POST['email'];
$emptyFieldFlag = 0;

if (!empty($newStudentLast) && !empty($newStudentFirst) && !empty($newStudentEmail))
{
    if (auth($username, $password))
    {
        $userId = find_id($username, $password);
        if (courseIdMatch($userId, $courseId))
        {
            $insert = "INSERT INTO tblStudents (ID_Courses, First_Name, Last_Name, Email)
            VALUES ('$courseId', '$newStudentFirst', '$newStudentLast', '$newStudentEmail')";
            if ($mysqli->query($insert) == true)
            {
                echo "";
            } else {
                echo "Something went wrong.";
            }
        }
    }
    
}else if (!empty($_GET["requestFlag"])){
    $emptyFieldFlag = 1;
}


echo "<h2>" . $courseName . " Students</h2>";

if (!empty($username) && !empty($password))
{
    if (auth($username, $password))
    {
        $userId = find_id($username, $password);
        if (courseIdMatch($userId, $courseId))
        {
            $query = "SELECT * FROM tblStudents WHERE ID_Courses = '$courseId' ORDER BY Last_Name";
            $result = mysqli_query($mysqli, $query);
            echo "<table border = 1>
            <tr>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Email</th>
            </tr>";
            
            while ($row = mysqli_fetch_array($result))
            {
                echo "<tr>";
                echo "<td>" . $row['Last_Name'] . "</td>";
                echo "<td>" . $row['First_Name'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
            }
            echo "<tr>";
            echo "<form action='students.php?courseId=" . $courseId . "&requestFlag=1' method='post'>";
            
            echo "<td>";
            if ($emptyFieldFlag == 1)
            {
                echo "<label class='tooHigh'>Please fill all fields:</label></br>";
            }
            echo "<input type='text' name='lastName'></td>";
            echo "<td><input type='text' name='firstName'></td>";
            echo "<td><input type='text' name='email'></td>";
            echo "<td><input type='submit' value='+'></td>";
            echo "</table>";
            
        }
    }
}


?>