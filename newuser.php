<?php 
include 'core/init.php';
$username = $_POST["username"];
$email = $_POST["email"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$first = $_POST["first"];
$last = $_POST["last"];
$emailAlreadyUser = "";
$userAlreadyExists = "";

if (!empty($username) && !empty($email) && !empty($password) && !empty($first) && !empty($last))
{
    if (user_exists($username))
    {
        $userAlreadyExists = "This username is already in use.";
    }  else
    {
        $insert = "INSERT INTO tblUsers (Username, Password_Hash, First_Name, Last_Name, Email)
        VALUES ('$username', '$password','$first', '$last', '$email')";
        if ($mysqli->query($insert) == true)
        {
            setCookie("Username", $_POST['username']);
            setCookie("Password", $_POST['password']);
            header('Location: courses.php');
        } else {
            /* echo '<pre>', var_dump($mysqli), '</pre>'; */
            $userAlreadyExists = "Username already exists.";
            die(mysqli_error);
        }
    }
} else if (!empty($_POST)) {
    echo "<script> alert('User creation failed. Be sure to complete all fields.')</script>";
}

?>

<?php include 'includes/full/header.php';?>
<body>
    <div class="logForm col-md-2 offset-md-5 text-center">
        <h1 class="h3 mb-3 font-weight-normal">Let's get started!</h1>
        <form action="newuser.php" method="post">
            <input type="text" name="email" class="form-control" placeholder="Email"></br>
            <?php if(!empty($emailAlreadyUser)) { echo "<label class='error'>$emailAlreadyUser</label><br>"; } ?>
            <input type="text" name="username" class="form-control" placeholder="Username"></br>
            <?php if(!empty($userAlreadyExists)) { echo "<label class='error'>$userAlreadyExists</label>"; } ?>
            <input type="password" name="password" class="form-control" placeholder="Password"></br>
            <input type="text" name="first" class="form-control" placeholder="First Name"></br>
            <input type="text" name="last" class="form-control" placeholder="Last Name"></br>
            <input type="submit" value="Create" class="buttons btn btn-lg btn-primary btn-block">
        </form>
    </div>
</body>
<?php include 'includes/full/footer.php';?>