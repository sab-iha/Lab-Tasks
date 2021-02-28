<?php 
    
    

    session_start();
    
    if(isset($_SESSION["uname"]))
    {
       header("Location:profilepage.php" );
    }

   if(isset($_POST["login"]))
   {
        $remember = " ";
        $uname = $_POST["uname"];
        $pass = $_POST["pass"];
        $remember = $_POST["remember"];

      if(empty($uname))  
      {  
           $error = "<label class='text-danger'>User Name cannot be Empty!</label>";  
      }
      else if(empty($pass))  
      {  
           $error = "<label class='text-danger'>Password cannot be empty!</label>";  
      }
      else 
      {
           $data = file_get_contents("data.json");
           $array_data = json_decode($data, true);
           foreach ($array_data as $row) {
                
                 if ($row["uname"] == $uname && $row["pass"] == $pass) {
                    if (!empty($remember)) {
                         setcookie("uname",$uname, time()+ (60*60*24*365*2));
                         setcookie("pass",$pass, time()+ (60*60*24*365*2));
                         
                         $_SESSION["uname"] = $row["uname"];
                         $_SESSION["pass"] = $row["pass"];

                         header('location:profilepage.php');
                    }
                    else
                    {
                         $_SESSION["uname"] = $row["uname"];
                         $_SESSION["pass"] = $row["pass"];
                         header('location:profilepage.php');
                    }  
                    
                 }
                 else
                 {
                    $error = "<label class='text-danger'>Invalid User name or Password!</label>";
                 }
                 
           }
      }         


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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <title>Login</title>
</head>
<body>
<div class="container-fluid" style="width:500px; padding: 50px; margin-top:50px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">  
                                 
                <form method="post">  
                    <h3 style="font-weight:bold;text-align:center;">Login</h3><br />
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />   
                     <label>User Name</label>  
                     <input type="text" name="uname" class="form-control" /><br />
                     <label>Password</label>  
                     <input type="password" name="pass" class="form-control" /><br /> 
                     <input type="checkbox" name="remember" /> Remember me? <br> <br>
                     <input type="submit" name="login" value="login" class="btn btn-info" /> &nbsp;
                     <a href="changePass.php">Forgot Password?</a>
                     
                     <?php  
                     if(isset($message))  
                     {  
                          echo $message;  
                     }  
                     ?>  
                </form>  
           </div>  
</body>
</html>