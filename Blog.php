<?php require_once("include/DB.php"); ?>
<?php require_once("include/Sessions.php"); ?>
<?php require_once("include/Functions.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Blog</title>

	<link rel="stylesheet" href="css/bootstrap.min.css">  
    <script src="js/jquery.min.js"></script>  
    <script src="js/bootstrap.min.js"></script>  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"> <!-- font awesome -->

    <link rel="stylesheet" href="css/adminstyles.css">  
    <link rel="stylesheet" href="css/publicstyles.css"> 
    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand" href="Blog.php?Page=1" style="font-size: 25px; color: #6907B7; font-weight:bold;"> ENLIGHTENhub </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> <!-- Toggler -->

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto navBarItems  " style="font-size: 20px;">

                
                 
                <li class="nav-item ">
                    <a class="nav-link text-warning" href="Blog.php?Page=1">Home</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-warning" href="about.php">About</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-warning" href="features.php">Features </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-warning" href="#"></a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link text-warning" href="#">Contact us</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0" action="Blog.php">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="Search">
                <button class="btn btn-danger my-2 my-sm-0" type="submit" name="SearchButton">Search</button>
            </form>

            <a class="nav-link text-dark" href="login.php" target="_blank" style="font-size: 22px;"><i class="fas fa-user"></i>&nbsp; Login</a>
         
           
        </div>  
    </nav>  
    
    <div class="container">
    	<div class="blog-header">
    		<h1>All posts : </h1>
    		 	</div>  
    	<div class="row">
    		<div class="col-sm-8">
    			<?php  
	    			global $Connection;

	    			if (isset($_GET["SearchButton"])) {  
	    				$Search = $_GET["Search"];
	    				$viewQuery = "SELECT * FROM admin_panel WHERE 
	    							 datetime LIKE '%$Search%' OR title LIKE '%$Search%' OR category LIKE '%$Search%' OR post LIKE '%$Search%' ORDER BY id desc";

	    			} elseif (isset($_GET["Category"])) {  
                        $Category = $_GET["Category"];
                        $viewQuery = "SELECT * FROM admin_panel WHERE category='$Category' ORDER BY id desc";

                    } elseif (isset($_GET["Page"])) {  
                        $Page = $_GET["Page"];

                        if ($Page <= 0) {
                            $ShowPostFrom=0;
                        } else {
                            $ShowPostFrom = ($Page*5)-5;
                        }

                        $viewQuery = "SELECT * FROM admin_panel ORDER BY id desc LIMIT $ShowPostFrom,5 ";

                    } else {
                        
		                $viewQuery = "SELECT * FROM admin_panel ORDER BY id desc";}

		                $Execute = mysqli_query($Connection, $viewQuery);

		                while ($DataRows = mysqli_fetch_array($Execute)) {
		                    $PostId = $DataRows["id"];
		                    $DateTime = $DataRows["datetime"];
		                    $Title = $DataRows["title"];
		                    $Category = $DataRows["category"];
		                    $Admin = $DataRows["author"];
		                    $Image = $DataRows["image"];
		                    $Post = $DataRows["post"];
		                			?>
    			<div class="blogpost img-thumbnail">
    				<img class="figure-img" width="100%" src="Upload/<?php echo $Image; ?>" alt="thumbnail">
    				<div class="figure-caption">
    					<h1 id="heading"><?php echo htmlentities($Title); ?></h1>
    					<p class="description">Category: <?php echo htmlentities($Category); ?> | Published on: <?php echo htmlentities($DateTime); ?>
                           
                            
                        </p>
    					<p class="post">
    						<?php
    							if (strlen($Post) > 150) {
    								$Post = substr($Post, 0, 150).'...';
    							}
    							echo htmlentities($Post); 
    						?>
    					</p>
    				</div>  
    				<a href="fullPost.php?id=<?php echo $PostId; ?>"><span class="btn btn-outline-info float-right">Read More &rsaquo;&rsaquo;
    				</span></a>
    			</div>  
    		<?php } ?>

           
            <nav>
                <ul class="pagination pagination-lg float-left">
                    
                    <?php
                        if (isset($Page)) {
                            if ($Page>1) {
                    ?>
                        <li class="page-item"><a class="page-link" href="Blog.php?Page=<?php echo $Page-1; ?>"> &laquo; </a></li>
                        <?php
                            } 
                        } 
                        ?> 
            <?php  
                global $Connection;
                $QueryPagination="SELECT COUNT(*) AS cpp FROM admin_panel";
                $ExucutePagination = mysqli_query($Connection, $QueryPagination);
                $Value =mysqli_fetch_array($ExucutePagination);
                $rows = $Value['cpp'];
                $PostsPagination = $rows/5;
                $PostsPagination = ceil($PostsPagination); 

                for ($i=1; $i<=$PostsPagination; $i++) {
                    if (isset($Page)) {
                        if ($i==$Page) {
            ?>
                    <li class="active page-item"><a class="page-link" href="Blog.php?Page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php 
                    } else { ?> 
                        <li class="page-item"><a class="page-link" href="Blog.php?Page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php
                        }  
                    }  
                }  
                        ?>
                         
                        <?php
                        if (isset($Page)) {
                            if ($Page+1 <= $PostsPagination) {
                    ?>
                        <li class="page-item"><a class="page-link" href="Blog.php?Page=<?php echo $Page+1; ?>"> &raquo; </a></li>
                        <?php
                            } 
                        } 
                        ?>
                        
                </ul>
            </nav>
    		</div>  

            
    		<div class="offset-1 col-sm-3">
    			 
              
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        <h4 class="card-title card-danger">Category</h4>
                    </div>
                    <div class="card-body bg-light">
                        <?php
                        $Connection;

                        $ViewQuery = "SELECT * FROM category ORDER BY id desc";
                        $Execute = mysqli_query($Connection, $ViewQuery);

                        while ($DataRows = mysqli_fetch_array($Execute)) {
                            $Id = $DataRows['id'];
                            $Category = $DataRows['name'];
                        ?>
                        <a href="Blog.php?Category=<?php echo $Category; ?>">
                            <span id="heading"> <?php echo $Category. "<br>"; ?> </span>
                        </a>
                    <?php } ?>
                    </div>
                    <div class="card-footer bg-secondary">
                        
                    </div>
                </div>  
                <br>
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        <h4 class="card-title card-danger">Recent Posts</h4>
                    </div>
                    <div class="card-body bg-light">
                        <?php
                        $Connection;
                        $viewQuery = "SELECT * FROM admin_panel ORDER BY id desc LIMIT 0,4";  
                        $Execute = mysqli_query($Connection, $viewQuery);

                        while ($DataRows = mysqli_fetch_array($Execute)) {
                            $Id = $DataRows['id'];
                            $Title = $DataRows['title'];
                            $DateTime = $DataRows['datetime'];
                            $Image = $DataRows['image'];
                            if (strlen($DateTime) > 11) {
                                $DateTime = substr($DateTime, 0,11);
                            }
                        ?>
                        <div>
                            <img class="float-left" style="margin-top: 10px; margin-left: 10px;" width="70" height="70" src="Upload/<?php echo htmlentities($Image); ?>" alt="">
                            <a href="fullPost.php?id=<?php echo $Id; ?>"><p  id="heading"  style="margin-left: 90px;"><?php echo htmlentities($Title); ?></p></a>
                            <p class="description" style="margin-left: 90px;"><?php echo htmlentities($DateTime); ?></p>
                            <hr>
                        </div>
                    <?php } ?>
                    </div>
                    <div class="card-footer bg-secondary">
                        
                    </div>
                </div>  
                <br>
    		</div>  
    	</div>  
    </div>  

    <?php include("include/Footer.php"); ?>  
</body>
</html>
