<?php 
   
   session_start();
    
   if(isset($_SESSION["uname"]))
   {
      header("Location:profilepage.php" );
   }
  
   if(isset($_POST["submit"]))
   {
        $gender="";
        $name = $_POST["name"];
        $email = $_POST["email"];
        $uname = $_POST["uname"];
        $pass = $_POST["pass"];
        $conpass = $_POST["conpass"];
        $gender = $_POST["gender"];
        $dob = $_POST["dob"];
      

       


      if(empty($name))  
      {  
           $error = "<label class='text-danger'>Name cannot be Empty!</label>";  
      }
      else if(empty($email))  
      {  
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $error = "<label class='text-danger'>Email not valid!</label>";
        }   
        else 
         {
            $error = "<label class='text-danger'>Email cannot be Empty!</label>";
         }   
      }
      else if(empty($uname))  
      {  
           $error = "<label class='text-danger'>User Name cannot be empty!</label>";  
      }
      else if(empty($pass) || empty($conpass))  
      {  
           if ($pass != $conpass) 
           {
              $error = "<label class='text-danger'>Password and Confirm Password do not match!</label>";    
           }
           $error = "<label class='text-danger'>Password and Confirm Password cannot be empty!</label>";   
      }
      else if(empty($gender))  
      {  
           $error = "<label class='text-danger'>Confirm Password cannot be empty!</label>";  
      }
      else if(empty($dob))  
      {  
           $error = "<label class='text-danger'>Date of Birth cannot be empty!</label>";  
      }
      else 
      {
           if(file_exists('data.json'))
           {
             $json_data = file_get_contents('data.json');
             $array_data = json_decode($json_data, true);
             $post_data = array(
                  'name'   =>   $name,
                  'email'  =>   $email,
                  'uname'  =>   $uname,
                  'pass'   =>    $pass,
                  'gender' =>  $gender,
                  'dob'  =>   $dob,
             );

             $array_data[] = $post_data;
             $final_data = json_encode($array_data);
             if(file_put_contents('data.json', $final_data))
             {
               $message = "<label class='text-success'>Registration Successful!</label>"; 
             }
            
           }
           else  
           {  
                $error = 'JSON File not exits';  
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
    <title>Document</title>
</head>
<body>
<div class="container-fluid" style="width:500px; padding: 50px; margin-top:50px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">  
                                 
                <form method="post">  
                    <h3 style="font-weight:bold;text-align:center;">User Registration</h3><br />
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />  
                     <label>Name</label>  
                     <input type="text" name="name" class="form-control" /><br />  
                     <label>Email</label>  
                     <input type="text" name="email" class="form-control" /><br />  
                     <label>User Name</label>  
                     <input type="text" name="uname" class="form-control" /><br />
                     <label>Password</label>  
                     <input type="password" name="pass" class="form-control" /><br /> 
                     <label>Confirm Password</label>  
                     <input type="password" name="conpass" class="form-control" /><br /> 
                     <label for="male">Male</label>  
                     <input type="radio" name="gender"  value="male"/>
                     <label for="female">Female</label>
                     <input type="radio" name="gender"  value="female"/>   <br /> <br />
                     <label for="female">Date of Birth</label>
                     <input type="date" name="dob" class="form-control"><br /> <br />
                     <input type="submit" name="submit" value="Register" class="btn btn-info" /> &nbsp;
                     <a href="login.php"  class="btn btn-info">Login</a>                     
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