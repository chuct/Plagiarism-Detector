<?php
include 'core/init.php';
include 'includes/full/header.php';

$courseId = 15679;
$assnId = 7;

if (!empty($username) && !empty($password))
    {
        if (auth($username, $password))
        {
            if (!empty($courseId) && !empty($assnId))
            {
                $userId = find_id($username, $password);
                if (courseIdMatch($userId, $courseId))
                {
                    $sql = "SELECT 
                                sub1Id, 
                                (SELECT CONCAT(First_Name, ' ', Last_Name) FROM tblComparisons AS T1, tblSubmissions AS T2, tblStudents AS T3 WHERE T1.sub1Id = T2.ID_Submissions AND T2.ID_Students = T3.ID_Students) as sn1,
                                sub2Id,
                                (SELECT CONCAT(First_Name, ' ', Last_Name) FROM tblComparisons AS T1, tblSubmissions AS T2, tblStudents AS T3 WHERE T1.sub2Id = T2.ID_Submissions AND T2.ID_Students = T3.ID_Students) as sn2,
                                pScore
                            FROM tblComparisons as T1, tblAssignments as T2, tblCourses as T3
                            WHERE T1.ID_Assignments = T2.ID_Assignments AND T1.ID_Courses = T3.ID_Courses AND T1.ID_Assignments = ? AND T1.ID_Courses = ?";
                    $result = array("sub1Id"=>0, "sub2Id"=>0, "pScore"=>0);
                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param('ii', $courseId, $assnId);
                    $stmt->execute();
                    $stmt->bind_result($result['sub1Id'], $result['sub2Id'], $result['pScore']);
                    $stmt->fetch();
                    $stmt->close();
                }
            }
        }
    }
$sql = "SELECT 
        	sub1Id, 
        	(SELECT CONCAT(First_Name, ' ', Last_Name) FROM tblComparisons AS T1, tblSubmissions AS T2, tblStudents AS T3 WHERE T1.sub1Id = T2.ID_Submissions AND T2.ID_Students = T3.ID_Students) as sn1,
        	sub2Id,
        	(SELECT CONCAT(First_Name, ' ', Last_Name) FROM tblComparisons AS T1, tblSubmissions AS T2, tblStudents AS T3 WHERE T1.sub2Id = T2.ID_Submissions AND T2.ID_Students = T3.ID_Students) as sn2,
        	pScore
        FROM tblComparisons as T1, tblAssignments as T2, tblCourses as T3
        WHERE T1.ID_Assignments = T2.ID_Assignments AND T1.ID_Courses = T3.ID_Courses AND T1.ID_Courses = ? AND T1.ID_Assignments = ? ";
$result = array("sub1Id"=>0, "sn1"=>"", "sub2Id"=>0, "sn2"=>"", "pScore"=>0);
$a = $stmt = $mysqli->prepare($sql);
$b = $stmt->bind_param('ii', $courseId, $assnId);
$c = $stmt->execute();
$d = $stmt->bind_result($result['sub1Id'], $result['sn1'], $result['sub2Id'], $result['sn2'], $result['pScore']);
$stmt->fetch();
var_dump($result);
$stmt->close();
?>

