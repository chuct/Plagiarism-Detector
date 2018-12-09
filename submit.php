<?php
include 'core/init.php';
include 'includes/full/header.php';
require 'awssdk/aws.phar';
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception; 
$studentId = $_GET['studentId']; $courseId = $_GET['courseId']; $assignmentId = $_GET['assnId'];
$errorStart = '<span class="submitError">';
$errorEnd = '</span>';
$notFound = $errorStart."No Assignment ID was found.  Please contact your class administrator for the submission link to your assignment.".$errorEnd;
$notAuthorized = $errorStart."You are not authorized to make a submission for this assignment.  Please contact your class administrator to get your submission link.".$errorEnd;

if(empty($assignmentId)) {
    echo $notFound;
}
elseif(empty($studentId) || empty($courseId)) {
    echo $notAuthorized;
}
else {
    $studentCourseMatch = 0; // studentId is associated with courseId - Default False (0)
    $assnCourseMatch = 0; // assnId is associated with submitted courseId - Default False (0)
    $filename = 'Course-' . $courseId . 'Assignment-' . $assignmentId . 'Student-' . $studentId;
    
    // Check that student belongs to course & requested assignment belongs to course
    $stmt = $mysqli->prepare("SELECT count(ID_Students) FROM tblStudents WHERE ID_Students = ? AND ID_Courses = ?");
    $stmt->bind_param('ii', $studentId, $courseId);
    $stmt->execute();
    $stmt->bind_result($studentCourseMatch);
    $stmt->fetch();
    $stmt->close();
    
    // CHECK THAT ID_Assignments <-> ID_Courses
    $stmt = $mysqli->prepare("SELECT count(ID_Assignments) FROM tblAssignments WHERE ID_Assignments = ? AND ID_Courses = ?");
    $stmt->bind_param('ii', $assignmentId, $courseId);
    $stmt->execute();
    $stmt->bind_result($assnCourseMatch);
    $stmt->fetch();
    $stmt->close();
    
    //form to upload file to /submissions/
    if($studentCourseMatch && $assnCourseMatch) {
        
        $query = "SELECT First_Name, Last_Name FROM tblStudents
        WHERE ID_Students = '$studentId' LIMIT 1";
        
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result))
        {
            $fname = $row['First_Name'];
            $lname = $row['Last_Name'];
        }
        
        $query = "SELECT Assignment_Name FROM tblAssignments
        WHERE ID_Assignments = '$assignmentId' LIMIT 1";
        
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result))
        {
            $assnName = $row['Assignment_Name'];
        }
        
        ?>
        <h2><strong>Assignment Name</strong> <br> <?php echo $assnName;?> </h2><br>       
        <h2><strong>Student Name</strong> <br> <?php echo $fname . " " . $lname;?> </h2><br>
        <h2><strong>Select a file to submit</strong></h2>
        Files must be less than 5,000 kb and .pdf .doc .docx or .odt
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <br>
            <input class="inputfile" type="file" name="fileToUpload" id="fileToUpload"> 
            <br>
            <br>
            <input type="submit" value="Submit" class="starterLink" style="margin: 0;">
            <input type="hidden" name="filename" value="<?php echo $filename;?>">
            <input type="hidden" name="courseID" value="<?php echo $courseId;?>">
            <input type="hidden" name="assignmentID" value="<?php echo $assignmentId;?>">
            <input type="hidden" name="studentID" value="<?php echo $studentId;?>">            
        </form>

        <br> Please allow up to 30 seconds for your file to be uploaded and then scanned for plagiarism.
        
        <?php
        
    }else {
        echo $notAuthorized;
    }
}
include 'includes/full/footer.php';
?>