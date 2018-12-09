<!DOCTYPE html>
<html>
    <?php include 'core/init.php';?>
    <?php include 'includes/head.php';?>
    
    <style type="text/css">
        body {
        font-family:  'Helvetica Neue', Arial, sans-serif;
        height: auto;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
        background-position: center;
        background-image: url(../img/bg.jpg);
        }
        
        p, h4 {
            color: #ebebeb;
        }
        
        a, .navbar-header {
            color: rgba(255, 255, 255, .7);
        }
        
        .navbar-default,a {
            -webkit-transition: all .35s;
            -moz-transition: all .35s;
        }
        
        hr{
            margin:0px;
            border-color: #595959;
        }
        
        .btn-secondary{
           transition: all .35s;
           border-radius: 300px;
        }
    </style>

    <body id="page-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand page-scroll" href="#page-top"><b>The Plagiarinator</b></a>
                <hr>
            </div>
        </div>
        
        <div class="titleCenter" style="margin-top: 150px">
            <img src="img/title.png">
        </div>
        
        <div class="col-md-12 text-center" style="margin-top: 40px">
            <h4 class="mb-3 font-weight-normal">Get started now and create an account</h4>
            <a href="newuser.php" class="btn btn-lg btn-secondary" role="button">Sign Up</a>
        </div>
        
        <div  class="col-md-12 text-center" style="margin-top: 60px">
            <h4 class="mb-3 font-weight-normal">Already have an account?</h4>
            <a href="login.php" class="btn btn-lg btn-secondary" role="button" >Login</a>
        </div>
    </body>
    <div class="footer" style="position: absolute; bottom: 1px;">
        <p>&copy; 2018. Fundementals of Software Engineering - Group 1.</p>
    </div>
</html>