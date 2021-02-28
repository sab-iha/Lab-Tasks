<?php 
     
    session_start();

    if ( isset($_GET["logout"]) AND $_GET["logout"] == "success")
    {
        session_destroy();
        header("Location:login.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="styles.css" />    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
    <title>Dashboard</title>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="">EduValuation</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
       <li class="dropdown">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">Assessment<span class="caret"></span></a>
           <ul class="dropdown-menu" style="background-color:black;">
               <li><a href="" style="color:#ffff;">Quiz</a></li>
               <li><a href=""style="color:#ffff;">Mid</a></li>
               <li><a href=""style="color:#ffff;">Final</a></li>
           </ul>
       </li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown-toggle" data-toggle="dropdown"><a href="#"><span class="glyphicon glyphicon-user"></span> Settings</a></li>
      <ul class="dropdown-menu" style="background-color:black;">
               <li><a href="" style="color:#ffff;">Profile</a></li>
               <li><a href=""style="color:#ffff;">Password</a></li>
               <li><a href=""style="color:#ffff;">About</a></li>
           </ul>
      <li><a href="?logout=success"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
    </ul>
  </div>
</nav>



<div class="sidenav">
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

<!-- Page content -->
<div class="main">
  ...
</div>



</body>
</html>