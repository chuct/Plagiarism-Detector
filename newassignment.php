<?php 
include 'core/init.php';

$username = $_COOKIE["Username"];
$password = $_COOKIE["Password"];

$assnName = $_POST["assnName"];
$assnDue = $_POST["assnDue"];
$courseId = $_GET['courseId'];

if (empty($username) || empty($password))
{
    //not logged in
    echo "No username or password";
} else if (!empty($assnName) && !empty($assnDue))
{
    if (auth($username, $password))
    {
        $userId = find_id($username, $password);
        if (courseIdMatch($userId, $courseId))
        {
            $currDate = date('Y/m/d');
    
            $insert = "INSERT INTO tblAssignments (ID_Courses, Assignment_Name, Assignment_Deadline, Assignment_Creation)
            VALUES ('$courseId', '$assnName', '$assnDue','$currDate')";
            if ($mysqli->query($insert) == true)
            {
                echo "Assignment creation successful";
            } else {
                echo "Assignment creation failed.";
            }
        }
    } else {
        echo "Log in failed";
    }
} else {
    echo "Assn info empty";
}

include 'includes/full/header.php';?>
<div class="col-md-4 offset-md-4 text-center" style="margin-top: 350px">
    <h3 class="h3 mb-3 font-weight-normal">Create New Assignment</h1></br>
    <form action="<?php echo "newassignment.php?courseId= " . $courseId ?>" method="post">
        <input type="text" name="assnName" class="form-control" placeholder="Assignment Name"></br>
        <label>Due Date</label>
        <input type="date" name="assnDue"class="form-control" placeholder="Assignment Name"></br>
        <input type="submit" value="Create" class="buttons btn btn-lg btn-primary btn-block"></br>
    </form>
</div>
<?php include 'includes/full/footer.php';?>