<?php

require_once '../Model/DbConnect.php';
require_once '../Model/model.php';

session_start();

if (isset($_GET['logout']) AND $_GET['logout'] =='success') {
    
    session_destroy();

    setcookie('user_login_id', '', time() - (60*60*24*365*2) );

    header('location:login.php');
}

/**
     * if session is not set Profile page cannot be accessed when user is not logged in
     */
if (!isset($_SESSION['ID']) AND !isset($_SESSION['name']) AND !isset($_SESSION['email']) ) {
    	
    header('location:login.php');
}


?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Document</title>
    
    <style>
          ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 46px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #4CAF50;
}







body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 100px;
  position: fixed;
  top: 10;
  left: 10;
  background-color: #333;
  overflow-x: hidden;
  padding-top: 40px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 15px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}





.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 30px;
  text-decoration: none;
}

.dropdown {
  float: right;
  overflow: hidden;
  padding: 0px 20px;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>
</head>

<body>
<div class="navbar">
  <a href="#home">Home</a>
  <a href="#news">News</a>
  <div class="dropdown">
    <button class="dropbtn">Profile 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">Settings</a>
      <a href="editprofile.php">Edit Profile</a>
      <a href="#">Settings</a>
      <a href="?logout=success"> Logout</a>
    </div>
  </div> 
</div>


<div class="sidenav">
  <a href="#about">About</a>
  <a href="#services">Services</a>
  <a href="#clients">Clients</a>
  <a href="#contact">Contact</a>
</div>


<?php

if (isset($_GET['ID'])) {
    $mess  = $_GET['ID'];

    
}





?>








<div class="container" style="padding-left:140px">
   	   
   	   <div class="log w-50 mx-auto mt-5">

   	   	<?php 
            
            if (isset($mess)) {
            	echo $mess;
            }

   	   	?>
   	   	
           <a  class="btn btn-success btn-sm" href="allpeople.php">View All Users</a>
   	   	  <div class="card shadow">
   	      	
   	      	<div class="card-header">
   	      		<h2>Update your Info</h2>
   	      	</div>
   	      	<div class="card-body">
   	      		
                <!---the id is passed to the url when the update btn is pressed, so that the id stays in the url to load the data in the form-->

                 <form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?php echo"$id_url"; ?>" method="POST"  enctype="multipart/form-data">
                 	 
                      <div class="form-group">
                      	<label for="">Name</label>
                      	<input class="form-control" type="text" value="<?php echo $single_data['first_name'] ?>" name="name">
                      	
                      </div>


                      <div class="form-group">
                      	<label for="">Email</label>
                      	<input class="form-control" type="text" value="<?php echo $single_data['email'] ?>" name="email">



                      <div class="form-group">
                        <label for="">Gender</label>
                        <br>
                        <input name="gender" class="" <?php if($single_data['gender']=='Male'): echo "checked"; endif; ?> type="radio" value="Male" id="male"><label for="male">Male</label>
                        <input name="gender" class="" <?php if($single_data['gender']=='Female'): echo "checked"; endif; ?> type="radio" value="Female" id="female"><label for="female">Female</label>
                      </div>


                                              
                       <div class="form-group">
                           <img  style="width: 150px;"src="photos/<?php echo $single_data['photo'] ?>">
                           <input type="hidden" value="<?php echo $single_data['photo'] ?>" name="old_photo">
                       </div>
                      <div class="form-group">
                      	
                      	<input type="file" name="photo">
                      	
                      </div>



                      <div class="form-group">
                      	
                      	<input class="btn btn-info" type="submit" value="update" name="update">
                      	
                      </div>

                 </form>

   	      	</div>

                
   	      	
   	      </div>

   	   </div>
   	     
   </div>


</body>
</html>