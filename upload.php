<?php
include 'core/init.php';
include 'includes/full/header.php';
require 'awssdk/aws.phar';
include 'CopyLeaks/autoload.php';

use Copyleaks\CopyleaksCloud;
use Copyleaks\CopyleaksProcess;
use Copyleaks\Products;
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

$filename = $_POST["filename"];
$courseID = $_POST["courseID"];
$assignmentID = $_POST["assignmentID"];
$studentID = $_POST["studentID"];

//save file to uploads folder in home dir 
$target_dir = "submissions/";        
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_file = $target_dir . $filename . '.' . $FileType;
$uploadOk = 1;

//check if file already exists
if (file_exists($target_file)) {
    echo "File already exists.";
    $uploadOk = 0;
} 

//Allow extensions: .pdf .doc .docx .odt 
if($FileType != "pdf" && $FileType != "doc" && $FileType != "docx"
&& $FileType != "odt" ) {
    echo "File must be .pdf .doc .docx .odt <br>";
    $uploadOk = 0;
}  

//check file size limit of 5,000 KB
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "File is too large.";
    $uploadOk = 0;
} 

//upload file if all tests passed
if ($uploadOk == 0) {
    echo "File was not uploaded.";
} else {
    
    //if file upload is successful run plagiarism detection api.
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
        //insert submission into table
        $insert = "INSERT INTO tblSubmissions (ID_Courses, ID_Assignments, ID_Students, filetype)
        VALUES ('$courseID', '$assignmentID', '$studentID', '$FileType')";
        if ($mysqli->query($insert) == true)
        {
            //echo "submission creation successful<br>";
            //echo $insert;
        } else {
            //echo "submission creation failed.<br>";
            //echo $insert;
        }
        
        
        $query = "SELECT First_Name, Last_Name FROM tblStudents
        WHERE ID_Students = '$studentID' LIMIT 1";
        
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result))
        {
            $fname = $row['First_Name'];
            $lname = $row['Last_Name'];
        }
        
        $query = "SELECT Assignment_Name FROM tblAssignments
        WHERE ID_Assignments = '$assignmentID' LIMIT 1";
        
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result))
        {
            $assnName = $row['Assignment_Name'];
        }
        
        ?>
        <h2><strong>Submission Successful!</strong></h2><BR>
        <h2><strong>Assignment Name</strong> <br> <?php echo $assnName;?> </h2><br>       
        <h2><strong>Student Name</strong> <br> <?php echo $fname . " " . $lname;?> </h2><br>
      
        <?php
        
        //Copyleaks API credentials
        $config = new \ReflectionClass('Copyleaks\Config');
        $clConst = $config->getConstants();
        $email = 'foseualr@inboxbear.com';
        $apiKey = '5243fd9f-e724-469f-94e9-10456151b3a6';
        
        //Test credentials
        try{
        	$clCloud = new CopyleaksCloud($email, $apiKey, Products::Education);
        }catch(Exception $e){
        	echo "<Br/>Failed to connect to Copyleaks Cloud with exception: ". $e->getMessage();
        	die();
        }
        
        //validate login token
        if(!isset($clCloud->loginToken) || !$clCloud->loginToken->validate()){ 
        	echo "<Br/><strong>Bad login credentials</strong>";
        	die();
        }
        
        //try Copyleaks API request
        try{
            
        	//additional header options : https://api.copyleaks.com/GeneralDocumentation/RequestHeaders
        	$additionalHeaders = array();
        	
        	//Create process with filepath parameter
        	$process = $clCloud->createByFile($target_file, $additionalHeaders);
        	
        	//Wait for the scan to complete
        	while ($process->getStatus() != 100)
        	{
        	    sleep(2);              
        	}

            //Request Finished
            echo "<h2><strong>Plagiarism Detection Results</strong></h2>";

            //Fetch results
        	$results = $process->getResult();
        	
        	$plagiarismFound = 0;
        	
        	//Evaluate results
        	foreach ($results as $result) {
        	    
        	    $percentScore = $result->Percents;
        	    $urlReport = $result->EmbededComparison;
        	    
        	    //If Percent Score threshold of 10% link report to student
        	    if ($percentScore > 10){
        	       
        	        $plagiarismFound = 1;

                    echo "<a  class='starterLink' style='margin: 0;'  href='" . $urlReport . "'>" . $percentScore. "% Plagiarism Detected" . " </a><br>";

        	       
    	            //insert comparison into table
                    $insert = "INSERT INTO tblComparisons (ID_Courses, ID_Assignments, ID_Students, pScore, compareURL)
                    VALUES ('$courseID', '$assignmentID', '$studentID', '$percentScore', '$urlReport')";
                    if ($mysqli->query($insert) == true)
                    {
                        //echo "submission creation successful<br>";
                        //echo $insert;
                    } else {
                        //echo "submission creation failed.<br>";
                        //echo $insert;
                    }
        	     
        	    }
        	}
        	
        	// No plagiarism detected
        	if ($plagiarismFound == 0){
        	    
        	    echo "<BR><BR><strong>No significant plagiarism detected</strong><BR>";
        	} else {
        	    
        	    echo "<BR><BR><strong>Click the above links to see the comparison reports</strong><BR>";
        	}
        	
        	
        }catch(Exception $e){
        	echo "<br/>Plagiarism Detection failed with exception: ". $e->getMessage();
        }

        
    // file not saved to our server's submissions folder 
    } else {
        echo "Error " .$_FILES["fileToUpload"]["error"];
    }
}
?>