<?php require_once("include/DB.php"); ?>
<?php require_once("include/Sessions.php"); ?>
<?php require_once("include/Functions.php"); ?>

<?php confirm_Login(); ?>

<?php  
if(isset($_POST['Submit'])) {
    $Category = mysqli_real_escape_string($Connection, $_POST["Category"]);

    date_default_timezone_set("Asia/Colombo");
    $CurrentTime = time();
    $DateTime = strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
    $DateTime;
    $Admin = $_SESSION["Username"];
    if(empty($Category)) {
        $_SESSION["ErrorMessage"] = "All fields must be filled out.";
        Redirect_to("categories.php");
    } elseif (strlen($Category) > 99) {
        $_SESSION["ErrorMessage"] = "Too long name for category.";
        Redirect_to("categories.php");
    } else 
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Categories</title>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css"> 
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
                    <li class="nav-item"><a href="addNewPost.php" class="nav-link"><i class="fas fa-list-alt"></i>&nbsp; Add New Post</a></li>
                    <li class="nav-item active"><a href="categories.php" class="nav-link"><i class="fas fa-tags"></i>&nbsp; Categories</a></li>
                    <li class="nav-item"><a href="admins.php" class="nav-link"><i class="fas fa-user"></i>&nbsp; Manage Admins</a></li>
                    
                    <li class="nav-item"><a href="Blog.php?Page=1" class="nav-link" target="_blank"><i class="fas fa-rss-square"></i>&nbsp; Blog Homepage</a></li>

                </ul>
            </div>
    


        		<div class="col-md-9 col-xl-10 mainBar">
        			<h1>Manage Categories</h1>
                    <?php echo Message(); echo SuccessMessage(); ?>
                    <div>
                        <form action="categories.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <label for="categoryname"><span class="fieldInfo">Name:</span></label>
                                    <input class="form-control" type="text" name="Category" id="categoryname" placeholder="Category Name">
                                </div>
                                <br>
                                <input class="btn btn-primary btn-block" type="submit" name="Submit" value="Add New Category">
                                <br>
                            </fieldset>
                        </form>
                    </div>
                    <div class="table table-responsive">
                        <table class="table table-hover table-active table-striped">
                            <tr class="table-primary">
                                <th>No.</th>
                                <th>Date & Time</th>
                                <th>Category Name</th>
                                <th>Creator Name</th>
                                <th>Action</th>
                            </tr>
                             <?php  
                                global $Connection;

                                $viewQuery = "SELECT * FROM category ORDER BY id desc";
                                $Execute = mysqli_query($Connection, $viewQuery);

                                $SrNo = 0;  
                                while ($DataRows = mysqli_fetch_array($Execute)) {
                                    $Id = $DataRows["id"];
                                    $DateTime = $DataRows["datetime"];
                                    $CategoryName = $DataRows["name"];
                                    $CreatorName = $DataRows["creatorname"];
                                    $SrNo++;
                             ?>
                             <tr>
                                 <td> <?php echo $SrNo;  ?> </td>
                                 <td> <?php echo $DateTime;  ?> </td>
                                 <td> <?php echo $CategoryName;  ?> </td>
                                 <td> <?php echo $CreatorName;  ?> </td>
                                 <td> <a href="deleteCategory.php?id=<?php echo $Id; ?>"><span class="btn btn-danger">Delete</span></a> </td>
                             </tr>
                         <?php } ?>
                        </table>
                    </div>
        		</div>  
        	</div>  
        </div>  

        <?php include("include/Footer.php"); ?>  
    </body>
</html>
