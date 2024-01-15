<?php require_once("include/DB.php"); ?>
<?php require_once("include/Sessions.php"); ?>
<?php require_once("include/Functions.php"); ?>

<?php confirm_Login(); ?>


<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
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
    <!-- <div style="background-color: #b5b9f7; height: 2px;"></div> -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-xl-2 sideBar bg-success">
                <br><br>


                <ul class="nav nav-pills flex-column side_menu">
                    <li class="nav-item active"><a href="dashboard.php" class="nav-link"><i class="fas fa-th"></i>&nbsp; Dashboard</a></li>
                    <li class="nav-item"><a href="addNewPost.php" class="nav-link"><i class="fas fa-list-alt"></i>&nbsp; Add New Post</a></li>
                    <li class="nav-item"><a href="categories.php" class="nav-link"><i class="fas fa-tags"></i>&nbsp; Categories</a></li>
                    <li class="nav-item"><a href="admins.php" class="nav-link"><i class="fas fa-user"></i>&nbsp; Manage Admins</a></li>
                    
                    <li class="nav-item"><a href="Blog.php?Page=1" class="nav-link" target="_blank"><i class="fas fa-rss-square"></i>&nbsp; Blog Homepage</a></li>

                </ul>
            </div>  
            <div class="col-md-9 col-xl-10 mainBar"> 
                <div><?php echo Message();
                        echo SuccessMessage(); ?> </div>

                

                <div>
                    <table class="table table-striped table-hover table-responsive table-bordered">
                        <tr class="table-success">
                            <th>No</th>
                            <th>Post Title</th>
                            <th>Date & Time</th>
                            <th>Author</th>
                            <th>Category</th>
                            <th>Banner</th>
                           
                            <th></th>
                            <th></th>
                            <th>Details</th>
                        </tr>
                        <?php
                        global $Connection;

                        $viewQuery = "SELECT * FROM admin_panel ORDER BY id desc";
                        $Execute = mysqli_query($Connection, $viewQuery);

                        $SrNo = 0; 
                        while ($DataRows = mysqli_fetch_array($Execute)) {
                            $PostId = $DataRows["id"];
                            $DateTime = $DataRows["datetime"];
                            $Title = $DataRows["title"];
                            $Category = $DataRows["category"];
                            $Admin = $DataRows["author"];
                            $Image = $DataRows["image"];
                            $Post = $DataRows["post"];
                            $SrNo++;  

                        ?>
                            <tr>
                                <td> <?php echo $SrNo; ?> </td>  
                                <td style="color: blue;">
                                    <?php
                                    if (strlen($Title) > 20) {
                                        $Title = substr($Title, 0, 20) . '..';
                                    }
                                    echo $Title;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (strlen($DateTime) > 16) {
                                        $DateTime = substr($DateTime, 0, 16) . '..';
                                    }
                                    echo $DateTime;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (strlen($Admin) > 12) {
                                        $Admin = substr($Admin, 0, 12) . '..';
                                    }
                                    echo $Admin;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if (strlen($Category) > 8) {
                                        $Category = substr($Category, 0, 8) . '..';
                                    }
                                    echo $Category;
                                    ?>
                                </td>
                                <td> <img width="170px" height="100px" src="Upload/<?php echo $Image; ?> "></td>
                                
                                <td>
                                    <a href="editPost.php?Edit=<?php echo $PostId; ?>">
                                        <span class="btn btn-success">Edit</span>
                                    </a>
                                </td>
                                <th>
                                    <a href="deletePost.php?Delete=<?php echo $PostId; ?>">
                                        <span class="btn btn-danger">Delete</span>
                                    </a>
                                    </td>
                                <td>
                                    <a target="_blank" href="fullPost.php?id=<?php echo $PostId; ?>">
                                        <span class="btn btn-warning">Live Preview</span>
                                    </a>
                                </td>
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