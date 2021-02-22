<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
   <?php
       
       if(isset($_POST['register'])){
           
           $name = $_POST['name'];
           $email = $_POST['email'];
           $birth_daytime = $_POST['birthdaytime'];
           $blood_group = $_POST['bloodGroup'];
           $gender = $_POST['gender'];
           $degree = $_POST['degree'];
           
           

           $exploded_email = explode('@', $email);
           $valid_email = end($exploded_email);

           if(empty($name) || empty($email) || empty($birth_daytime) || empty($blood_group) || empty($gender) ||empty($degree)){

                 $mess = '<p style="color:red;"> All fields are Required!!!</p>';
           }
           elseif (strlen($name)<= 2) {
              if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $mess = '<p style="color:red;">only letters and white space allowed!!!</p>';
              }
           }
           elseif (!filter_var($valid_email, FILTER_VALIDATE_EMAIL) == false){
                $mess = '<p style="color:red;">Invalid Email!!!</p>';
           }
           elseif(empty($_POST['degree'])) {
                $mess = '<p style="color:red;">invalid degree!!!</p>';
           }else {
               
                $mess = '<p style="color:green;">success!!!</p>';
           } 


       }


   ?>

 <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <?php
            if (isset($mess)) {
            	echo $mess;
            }
      ?>
     <label for="">Name</label><br>
     <input type="text" name="name"><br><br>

     <label for="">email</label><br>
     <input type="text" name="email"> <br><br>

     <label for="">Date of birth</label><br>
     <input type="datetime-local" id="birthdaytime" name="birthdaytime"> <br><br>

     <label for="gender">Gender</label> <br>
     <input type="radio" name="gender" value="Male">Male
     <input type="radio" name="gender" value="female"> Female
     <input type="radio" name="gender" value="Other">Other
      <br>

     <label for="">Degree</label> <br>
     <input type="checkbox" name='degree[]' value="HSC">HSC
     <input type="checkbox" name='degree[]' value="SSC">SSC
     <input type="checkbox" name='degree[]' value="BSC">BSC
     <input type="checkbox" name='degree[]' value="MSC">MSC

     <br><br>

      <label for="">BLood group</label>
     <select name="bloodGroup" id="">
       <option value="B+">B+</option>
       <option value="B-">B-</option>
       <option value="A+">A+</option>
       <option value="A-">A-</option>
       <option value="AB+">AB+</option>
       <option value="AB-">AB-</option>
       <option value="O+">O+</option>
       <option value="O-">O-</option>
     </select>
     <br> <br>
     <input type="submit" name="register">
     
 </form>


</body>
</html>