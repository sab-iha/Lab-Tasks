<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    
    <title>Signup</title>
    <style>
 
    </style>
</head>

<body>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeInDown">
                <i class="fa fa-user" aria-hidden="true" style="margin:8px 8px 8px"><b>signup</b></i>
            </div>

            <!-- signup Form -->
            <div id="error" style="color:red;"></div>
            <form onsubmit="return validate()" method="POST" id="form" action="../controller/signup.php" enctype="multipart/form-data">
                <input type="text" id="name" class="fadeInDown" name="name" placeholder="name"><br><br>
                <input type="text" id="email" class="fadeInDown" name="email" placeholder="email"><br><br>
                Male
                <input type="radio" id="male" class="fadeInDown" name="gender" value="male">
                Female
                <input type="radio" id="female" class="fadeInDown" name="gender" value="female"><br><br>
                <input type="password" id="password" class="fadeInDown" name="password" placeholder="password"><br><br>
                <input type="file" id="image" name="image"><br><br>

                <input type="submit" class="fadeInDown" value="Sign In"  name="register">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>

        </div>
    </div>




<script type="text/javascript">


function validate(){
          
     const name = document.getElementById('name');
     const password = document.getElementById('password');
     const form = document.getElementById('form');
     const email = document.getElementById('email');
     const image = document.getElementById('image');
     const error = document.getElementById('error');

     if (name.value === '' || name.value === null) {
                alert("name cannot be empty");
                 return false;
              }
     
            if (name.value === '' || name.value === null) {
                alert("name cannot be empty");
                 return false;
              }
            
            else if (email.value === '' || email.value === null) {
                alert("email cannot be empty");
                return false;
            }

            else if (password.value === '' || password.value === null) {
                alert("password cannot be empty");
                return false;
            }
            else if(password.value.length < 6){
                alert("password must be more than 6");
                return false;
            }
            else{
                true;
            }
            
 }
</script>
</body>

</html>