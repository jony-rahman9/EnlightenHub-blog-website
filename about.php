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
    <script src="js/jquery.min.js"></script> <!-- link jquery -->
    <script src="js/bootstrap.min.js"></script> <!-- link bootstrap js -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"> <!-- font awesome -->

    <link rel="stylesheet" href="css/adminstyles.css">  
    <link rel="stylesheet" href="css/publicstyles.css">  
    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand" href="#" style="font-size: 25px; color: #6907B7; font-weight:bold;"> ENLIGHTENhub </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> 

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto navBarItems  " style="font-size: 20px;">

                
            <li class="nav-item ">
                    <a class="nav-link text-warning" href="Blog.php">Home</a>
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
    

        <div
  class="bg-image p-5 text-center shadow-1-strong rounded mb-9 text-white"
  style="background-image: url('images/i1.jpg') ;height:500px; background-size:cover ;  ">
<h1 class="mb-3 h2">About this blogsite </h1>


  <p>
  Enlighten Hub is a vibrant online space dedicated to igniting curiosity and fostering knowledge across diverse realms. 
  Founded on the belief that learning is a lifelong journey, we curate engaging content that spans technology, science,
   arts, and culture. Our mission is to inspire, inform, and empower our readers, making complex topics accessible and 
   stimulating intellectual curiosity. From insightful articles to thought-provoking discussions, Enlighten Hub is a haven 
   for inquisitive minds seeking enlightenment. Join us in exploring the wonders of our world, delving into the latest 
   advancements, and embracing the joy of continuous learning. Welcome to a community where curiosity knows no bounds.
  </p>
</div>
  
    <?php include("include/Footer.php"); ?>  
  
   
</body>
</html>
