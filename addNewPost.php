<?php require_once("include/DB.php"); ?>
<?php require_once("include/Sessions.php"); ?>
<?php require_once("include/Functions.php"); ?>

<?php confirm_Login(); ?>

<?php  
if(isset($_POST['Submit'])) {
    $Title = mysqli_real_escape_string($Connection, $_POST["Title"]);
    $Category = mysqli_real_escape_string($Connection, $_POST["Category"]);
    $Post = mysqli_real_escape_string($Connection, $_POST["Post"]);

    date_default_timezone_set("Asia/Colombo");
    $CurrentTime = time();
    $DateTime = strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
    $DateTime;
    $Admin = $_SESSION["Username"];
    $Image = $_FILES["Image"]["name"];
    $Target = "Upload/".basename($_FILES["Image"]["name"]);

    if(empty($Title)) {
        $_SESSION["ErrorMessage"] = "Title can't be empty.";
        Redirect_to("addNewPost.php");

    } elseif (strlen($Title) < 2) {
        $_SESSION["ErrorMessage"] = "Title should be al least 2 charactors.";
        Redirect_to("addNewPost.php");

    } else {  
        global $Connection;

        $insertQuery = "INSERT INTO admin_panel(datetime, title, category, author, image, post) 
        				VALUES ('$DateTime', '$Title', '$Category', '$Admin', '$Image', '$Post')";
        $Execute = mysqli_query($Connection, $insertQuery);

        move_uploaded_file($_FILES["Image"]["tmp_name"] , $Target);

        if ($Execute) {
            $_SESSION["SuccessMessage"] = "New post added successfully!";
            Redirect_to("addNewPost.php");
        } else {
            $_SESSION["ErrorMessage"] = "Something went wrong. Post not added. Try again.";
            Redirect_to("addNewPost.php");
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add New Post</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- link bootstrap css-->
        <script src="js/jquery.min.js"></script>  
        <script src="js/bootstrap.min.js"></script>  
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"> <!-- font awesome -->

        <link rel="stylesheet" href="css/adminstyles.css">  
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand" href="#" style="font-size: 25px; color: #6907B7; font-weight:bold;"> ENLIGHTENhub </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> <!-- Toggler -->

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto navBarItems  " style="font-size: 30px;">

                <li class="nav-item ">
                    <a class="nav-link text-light active" href="#">Admin Dashboard </a>
                </li>
               

            </ul>
              <a class="nav-link text-dark " href="logout.php" style="font-size: 22px;"><i class="fas fa-sign-out-alt"></i>&nbsp; Logout</a>
        </div>
    </nav>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-xl-2 sideBar bg-success">
                <br><br>


                <ul class="nav nav-pills flex-column side_menu">
                    <li class="nav-item "><a href="dashboard.php" class="nav-link"><i class="fas fa-th"></i>&nbsp; Dashboard</a></li>
                    <li class="nav-item active"><a href="addNewPost.php" class="nav-link"><i class="fas fa-list-alt"></i>&nbsp; Add New Post</a></li>
                    <li class="nav-item"><a href="categories.php" class="nav-link"><i class="fas fa-tags"></i>&nbsp; Categories</a></li>
                    <li class="nav-item"><a href="admins.php" class="nav-link"><i class="fas fa-user"></i>&nbsp; Manage Admins</a></li>
                    
                    <li class="nav-item"><a href="Blog.php?Page=1" class="nav-link" target="_blank"><i class="fas fa-rss-square"></i>&nbsp; Blog Homepage</a></li>

                </ul>
            </div>

        
        		<div class="col-md-9 col-xl-10 mainBar">
        			<h1>Add New Post</h1>
                    <?php echo Message(); echo SuccessMessage(); ?>  
                    <div>
                        <form action="addNewPost.php" method="POST" enctype="multipart/form-data">
                            <fieldset>

                                <div class="form-group">
                                    <label for="title"><span class="fieldInfo">Title:</span></label>
                                    <input class="form-control" type="text" name="Title" id="title" placeholder="Title">
                                </div>

                                <div class="form-group">
                                    <label for="categoryselect"><span class="fieldInfo">Category:</span></label>
                                    <select class="form-control" name="Category" id="categoryselect">
                                    	<option disabled="disabled"> --select-- </option>
                                    	<?php  
			                                global $Connection;

			                                $viewQuery = "SELECT * FROM category ORDER BY datetime desc";
			                                $Execute = mysqli_query($Connection, $viewQuery);

			                                
			                                while ($DataRows = mysqli_fetch_array($Execute)) {
			                                    $Id = $DataRows["id"];
			                                    $CategoryName = $DataRows["name"];
			                            ?>

			                            <option> <?php echo $CategoryName; ?> </option>
			                        <?php }   ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="imageselect"><span class="fieldInfo">Select Image:</span></label>
                                    <input type="file" class="form-control" name="Image" id="imageselect">
                                </div>

                                <div class="form-group">
                                    <label for="postarea"><span class="fieldInfo">Post:</span></label>
                                    <textarea name="Post" id="postarea" class="form-control"></textarea>
                                </div>

                                <br>
                                <input class="btn btn-primary btn-block" type="submit" name="Submit" value="Add New Post">
                                <br>
                                
                            </fieldset>
                        </form>
                    </div>
                  
                              
        		</div>  
        	</div>  
        </div>  

        <?php include("include/Footer.php"); ?>  
    </body>
</html>
