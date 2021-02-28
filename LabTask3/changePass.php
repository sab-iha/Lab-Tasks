<?php

 if (isset($_POST["change"])) {
     $email = $_POST["email"];
     $pass = $_POST["pass"];
     $newpass = $_POST["newpass"];
     $retypenewpass = $_POST["retypenewpass"];
      
     $data = file_get_contents("data.json");
     $array_data = json_decode($data, true);
     $count = 0;

     if (empty($email)|| empty($pass) || empty($newpass) || empty($retypenewpass)) {
         
        $error = "<label class='text-danger'>Field cannot be Empty!</label>";  
     }
     else 
     {
  
           foreach ($array_data as $row) {
                
                 if ($row["email"] == $email AND $row["pass"]==$pass)
                  {
                      $count++;
                      break;
                //          if ($retypenewpass == $newpass) 
                //          {
                //             $row["pass"] = $newpass;
                //             $post_data = array(
                //                 'email'  =>   $email,
                //                 'pass'   =>   $row["pass"]
                //             );
                //             $array_data = $post_data;
                //             $final_data = json_encode($array_data);
                //             if(file_put_contents('data.json',$final_data))
                //             {
                //                 $message = "<label class='text-success'>Password change Successful!</label>"; 
                //             }
                //             break;
                            
                //          }
                //          else
                //          {
                //             $error = "<label class='text-danger'>Password mismatch!</label>";
                //          }
                //          break;
                 }
                 else
                 {
                    $error = "<label class='text-danger'>Invalid User name or Password!</label>";
                 }
                 
           }
                     if ($retypenewpass == $newpass) 
                         {
                            $row["pass"] = $newpass;
                            $post_data = array(
                                'email'  =>   $email,
                                'pass'   =>   $row["pass"]
                            );
                            $array_data = $post_data;
                            $final_data = json_encode($array_data);
                            if(file_put_contents('data.json',$final_data))
                            {
                                $message = "<label class='text-success'>Password change Successful!</label>"; 
                            }

                            
                         }
                         else
                         {
                            $error = "<label class='text-danger'>Password mismatch!</label>";
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
    <title>Change password</title>
</head>
<body>
<div class="container-fluid" style="width:500px; padding: 50px; margin-top:50px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">  
                                 
                <form method="post">  
                    <h3 style="font-weight:bold;text-align:center;">Change Password</h3><br />
                     <?php   
                     if(isset($error))  
                     {  
                          echo $error;  
                     }  
                     ?>  
                     <br />

                        
                     <label>Email</label>  
                     <input type='text' name='email' class='form-control' /><br />   
                     <label>Current Password</label> ;
                     <input type="password" name="pass" class="form-control" /><br />
                     <label>New Password</label>  
                     <input type="password" name="newpass" class="form-control" /><br /> 
                     <label>Retype New Password</label>  
                     <input type="password" name="retypenewpass" class="form-control" /><br />
                     <input type="submit" name="change" value="change" class="btn btn-info" /> &nbsp;

                     
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