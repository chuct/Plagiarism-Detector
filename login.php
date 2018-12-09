<?php
include 'core/init.php';
#include 'core/user_authen.php';
$loginFail = "";
if (isset($_POST['username']) && isset($_POST['password']))
{
    if (auth($_POST['username'], $_POST['password']))
    {
        setCookie("Username", $_POST['username']);
        setCookie("Password", $_POST['password']);
        header('Location: courses.php');
    }
    else
    {
        $loginFail = "The username or password is incorrect.";
    }
}
?>
<?php include 'includes/full/header.php';?>

<div class="logForm col-md-2 offset-md-5 text-center">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <form action="login.php" method="post">
        <?php if(!empty($loginFail)) { echo "<label class='error'>$loginFail</label>"; } ?>
        <input type="text" name="username" class="form-control" placeholder="Username"><br>
        <input type="password" name="password" class="form-control" placeholder="Password"><br>
        <input type="submit" value="Submit" class="buttons btn btn-lg btn-primary btn-block">
    </form>
</div>

<div class="col-md-2 offset-md-5 text-center" style="margin-top: 50px">
    <label class="textLink"><a href="newuser.php">New User?</a></label>
</div>

<?php include 'includes/full/footer.php';?>