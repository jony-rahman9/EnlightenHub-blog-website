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
        <a class="navbar-brand" href="#" style="font-size: 25px; color: #6907B7; font-weight:bold;"> ENLIGHTENhub </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> <!-- Toggler -->

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
  class="bg-image p-5 text-center shadow-1-strong rounded mb-9 text-white "
  style="background-image: url('images/i1.jpg') ;height:500px; background-size:cover ;  ">
<h1 class="mb-3 h2">Features </h1>


<p>
Enlighten Hub offers a feature-rich environment, meticulously designed to elevate user experience and streamline content management. At its core is an intuitive Admin Panel, providing authorized administrators with centralized control over the entire platform. This dynamic hub excels in User Management, enabling administrators to efficiently oversee user accounts, ensuring a secure and personalized experience for each individual.

The platform prioritizes security through robust Login Password Management, employing advanced user authentication mechanisms. Leveraging the power of MySQL, Enlighten Hub seamlessly integrates a relational database, facilitating efficient data storage and retrieval. Admins wield the power of effortless Post Management, allowing them to add, edit, or delete posts with flexibility in content creation and maintenance.

A user-friendly Content Editing interface simplifies the process of creating and updating posts, catering to administrators' needs. With the ability to delete outdated or irrelevant posts, administrators uphold content relevance and maintain a high-quality user experience. The seamless addition of new posts is facilitated, keeping content fresh and engaging.

Enlighten Hub embraces Role-Based Access Control, ensuring that each team member possesses appropriate permissions, fostering a structured and secure environment. The platform's user-friendly interface promotes ease of use for both administrators and general users, resulting in a dynamic and enriching experience for all stakeholders.

</p>

</div>
  
    <?php include("include/Footer.php"); ?>  
   
</body>
</html>
