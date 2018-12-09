<?php
include 'core/init.php';
include 'core/user.php';
# include 'core/user_authen.php';
$username = $_COOKIE["Username"];
$password = $_COOKIE["Password"];
$course_Name = $_POST["course_Name"];
$course_Id = $_POST["course_Id"];

if (empty($username) || empty($password))
{
    //echo "You are not logged in. Course creation will not work.";
    //echo "<label class='textLink'><a href='login.php'>Click here to log in.</a></label>";
    // If user is not logged in, they shouldn't be able to see the course creation fields
}
if (!empty($username) && !empty($password) && !empty($course_Name) && !empty($course_Id))
{
    if (auth($username, $password))
    {
        // this should be $userId to be consistent with "$username"
        $teacherId = find_id($username, $password);
        
        // Our database is set to take dates in YYYY/MM/DD format.
        // if coded here otherwise, it shows as 0000-00-00
        $date = date('Y/m/d');
        
        $insert = "INSERT INTO tblCourses (ID_Courses, ID_Teacher, Course_Name, Course_Creation_DateTime)
        VALUES ('$course_Id', '$teacherId', '$course_Name', '$date')";
        if ($mysqli->query($insert) == true)
        {
            echo "Course creation successful";
        } else {
            echo "Course creation failed.";
            if (course_Id_exists($course_Id)) {
                echo " This Course Id already exists. Please enter a unique Course Id";
            }
        }
    }
}
?>

<?php include 'includes/full/header.php';?>
<div class="logForm col-md-2 offset-md-5 text-center">
    <h1 class="h3 mb-3 font-weight-normal">Create New Course</h1></br>
    <form action="newcourse.php" method="post">
        <input type="text" name="course_Name" class="form-control" placeholder="Course Name"></br>
        <input type="text" name="course_Id" class="form-control" placeholder="Enter a five-digit Course ID"></br>
        <input type="submit" value="Create" class="buttons btn btn-lg btn-primary btn-block"></br>
    </form>
</div>
<?php include 'includes/full/footer.php';?>