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
            if (!empty($courseId) && !empty($assnId))
            {
                $userId = find_id($username, $password);
                if (courseIdMatch($userId, $courseId))
                {
                    $query = "SELECT Assignment_Name FROM tblAssignments
                    WHERE ID_Assignments = '$assnId' LIMIT 1";
                    
                    
                    $result = mysqli_query($mysqli, $query);
                    while ($row = mysqli_fetch_array($result))
                    {
                        $assnName = $row['Assignment_Name'];
                    }
                    
                    echo "<h2>Submission list for  " . $assnName . "</h2><br>"; 
                    
                    
                    $query = "SELECT tblStudents.First_Name, tblStudents.Last_Name, tblSubmissions.Creation_Date, MAX(IFNULL(tblComparisons.pScore,0)) As Score, tblStudents.ID_Students, tblSubmissions.filetype 
                    FROM tblStudents INNER JOIN tblSubmissions ON tblStudents.ID_Students = tblSubmissions.ID_Students LEFT JOIN tblComparisons ON tblComparisons.ID_Students = tblSubmissions.ID_Students 
                    WHERE tblSubmissions.ID_Assignments = '$assnId' 
                    GROUP BY tblStudents.First_Name, tblStudents.Last_Name, tblSubmissions.Creation_Date, tblStudents.ID_Students, tblSubmissions.filetype 
                    ORDER BY tblStudents.Last_Name";

                    $result = mysqli_query($mysqli, $query);
                    
                    echo "<table border = 1>
                    <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Open Submission</th>
                    <th>Submission Date</th>
                    <th>Highest Plagiarism Score</th>
                    <th>Plagiarism Reports</th>
                    </tr>";
                    $count = 0; 
                    while ($row = mysqli_fetch_array($result))
                    {

                        echo "<tr>";
                        echo "<td>" . $row['Last_Name'] . "</td>";
                        echo "<td>" . $row['First_Name'] . "</td>";
                        echo "<td> <label class='textLink'><a href='submissions/Course-" . $courseId . "Assignment-" .$assnId . "Student-" .$row['ID_Students'] . "." . $row['filetype'] . "'>View Submission</a></label> </td>";
                        echo "<td>" . $row['Creation_Date'] . "</td>";
                        echo "<td>" . $row['Score'] . "</td>";
                        echo "<td> <label class='textLink'><a href='comparisonReport.php?courseId=" . $courseId . "&assnId=" .$assnId . "&studentId=" .$row['ID_Students'] . "'> View Plagiarism Reports </a></label> </td>";
                        
                        }
                    echo "</table>";
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
?>