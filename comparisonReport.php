<?php
include 'core/init.php';
include 'includes/full/header.php';

$username = $_COOKIE["Username"];
$password = $_COOKIE["Password"];

$courseId = $_GET["courseId"];
$assnId = $_GET["assnId"];
$studentId = $_GET["studentId"];


if (!empty($username) && !empty($password))
    {
        if (auth($username, $password))
        {
            if (!empty($courseId) && !empty($assnId))
            {
                $userId = find_id($username, $password);
                if (courseIdMatch($userId, $courseId))
                {
                    
                    $query = "SELECT First_Name, Last_Name FROM tblStudents
                    WHERE ID_Students = '$studentId' LIMIT 1";
                    
                    $result = mysqli_query($mysqli, $query);
                    while ($row = mysqli_fetch_array($result))
                    {
                        $fname = $row['First_Name'];
                        $lname = $row['Last_Name'];
                    }
                    
                    $query = "SELECT Assignment_Name FROM tblAssignments
                    WHERE ID_Assignments = '$assnId' LIMIT 1";
                    
                    $result = mysqli_query($mysqli, $query);
                    while ($row = mysqli_fetch_array($result))
                    {
                        $assnName = $row['Assignment_Name'];
                    }

                    echo "<h2><strong>Assignment Name</strong><br>" . $assnName. "</h2><br>";
                    echo "<h2><strong>Student Name</strong> <br>" . $fname . " " . $lname . "</h2><br>";
               
                    $query = "SELECT tblStudents.First_Name, tblStudents.Last_Name, tblComparisons.pScore, tblComparisons.compareURL
                    FROM tblStudents, tblComparisons 
                    WHERE tblStudents.ID_Students = tblComparisons.ID_Students
                    AND tblComparisons.ID_Assignments = '$assnId' and tblComparisons.ID_Courses = '$courseId' and tblComparisons.ID_Students = '$studentId'
                    ORDER BY tblComparisons.pScore DESC";

                    $result = mysqli_query($mysqli, $query);
                    
                    $count = 0; 
                    echo "<h2>Plagiarism Reports</h2>";
                    while ($row = mysqli_fetch_array($result))
                    {
                       
                    echo "<a  class='starterLink' style='margin: 0;'  href='" . $row['compareURL'] . "'>" . $row['pScore']. "% Plagiarism Detected" . " </a><br>";
                    }
                }
                else
                {
                    header('Location: wrongpage.php');
                }
            }
        }
    }
#echo "<a href='relationGrid.php?courseId=" . $courseId . "&assnId=" . $assnId . "'>Relation Grid</a>";
include 'includes/full/footer.php';
