<?php require_once("include/DB.php"); ?>
<?php require_once("include/Sessions.php"); ?>
<?php require_once("include/Functions.php"); ?>

<?php  
if(isset($_POST['Submit'])) {
    $Username = mysqli_real_escape_string($Connection, $_POST["Username"]);
    $Password = mysqli_real_escape_string($Connection, $_POST["Password"]);

    if(empty($Username) || empty($Password)) {
        $_SESSION["ErrorMessage"] = "All fields must be filled out.";
        Redirect_to("login.php");
    } else { 
        $Found_account = Login_attempt($Username, $Password);

        $_SESSION["User_id"] = $Found_account["id"];
        $_SESSION["Username"] = $Found_account["username"];

        if ($Found_account) {
            $_SESSION["SuccessMessage"] = "Welcome {$_SESSION["Username"]}";
            Redirect_to("dashboard.php");
        } else {
            $_SESSION["ErrorMessage"] = "Invalid Username / Password";
            Redirect_to("login.php");
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login Form</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">  
        <script src="js/jquery.min.js"></script>  
        <script src="js/bootstrap.min.js"></script>  
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"> <!-- font awesome -->

        <link rel="stylesheet" href="css/adminstyles.css">  
        <style>
            body {
                background-color: red;
            }
        </style>
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand" href="#" style="font-size: 25px; color: #6907B7; font-weight:bold;"> ENLIGHTENhub </a>

       <a class="nav-link ml-auto" href="Blog.php?Page=1" class="nav-link" target="_blank" style="font-size: 25px; color: red; font-weight:bold;">
       <i class="fas fa-rss-square"></i>&nbsp; Go to Homepage</a></li>

   </nav>
       

 <div style="background-color: red; height: 20px;"></div>
        <div class="container-fluid">
        	<div class="row">
        		<div class="col-sm-4 offset-xl-4 offset-lg-4 offset-md-4 offset-sm-4  mainBar bg-danger">
                    <br>
                    <?php echo Message(); echo SuccessMessage(); ?>
                    <br>
                    
        			<h2 class="text-center ">Admin Login</h2>
                    <br>
                    <div>
                        <form action="login.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <i class="input-group-text fa fa-user text-success"></i>
                                        </div>
                                        <input class="form-control" type="text" name="Username" id="username" placeholder="User Name">  
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="input-group input-group-lg">
                                        <div class="input-group-prepend">
                                            <i class="input-group-text fa fa-lock text-success"></i>
                                        </div>
                                        <input class="form-control" type="password" name="Password" id="password" placeholder="Password">
                                    </div>
                                </div>
                                <br>
                                <input class="btn btn-success btn-block btn-lg " type="submit" name="Submit" value="Login">
                                <br>
                            </fieldset>
                        </form>
                    </div>
                    <hr>    
        		</div>  
        	</div>  
        </div>  

         
    </body>
</html>
