<?php
include_once '../database/connect.php';
include_once 'general.php';
// need course id, student id, assignment id
// This is not working yet
function email_assignment_to_students($courseId, $assnId){
    global $mysqli;
    $courseId = sanitize($courseId);
    $linkToSubmission = "http://13.59.238.203/submit.php";
    $linkToSubmission .= "?courseId=$courseId";
    $linkToSubmission .= "&assnId=$assnId";
    // also add studentId, shorten code that makes up this link
    $emailResult = $mysqli->query("SELECT Email FROM tblStudents WHERE ID_Courses = '$courseId'");
    $studentIdResult = $mysqli->query("SELECT ID_Students FROM tblStudents WHERE ID_Courses = '$courseId'");
    if ($emailResult->num_rows > 0) {
        
        $headers = 'From: Jack Sparrow <jsparrow@blackpearl.com>' . PHP_EOL .
        'Reply-To: Jack Sparrow <jsparrow@blackpearl.com>' . PHP_EOL .
        'X-Mailer: PHP/' . phpversion();
        for ($i = 0; $i < $emailResult->num_rows; $i++) {
            $emailRow = $emailResult->fetch_array(MYSQLI_NUM);
            $studentIdRow = $studentIdResult->fetch_array(MYSQLI_NUM);
            $studentId = $studentIdRow[0];
            $submissionLink = $linkToSubmission . "&studentId=" . $studentId;
            
            //echo "<br> Student's Id: $studentId";
            echo "<br> Submission link: $submissionLink <br>";
            $email = $emailRow[0];
            echo "Email: $email <br> <br>";
            mail($email,"My subject",$submissionLink, $headers);
            $submissionLink = "";
        }
            echo "<br> Email attempt made! It may take a few minutes to be received. <br>";
    }
}
?>