<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
    <style>
 
    </style>
</head>

<body>

    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <?php
               if (isset($mess)) {
                   echo $mess;
               }
            
            ?>
            <!-- Icon -->
            <div class="fadeInDown">
                <i class="fa fa-user" aria-hidden="true" style="margin:8px 8px 8px"><b>Login</b></i>
            </div>

            
            <!-- Login Form -->
            <?php include_once "../controller/login.php" ?>
            <div id="error" style="color:red;"></div>
            <form method="POST" id="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="text" id="name" class="fadeInDown" name="name" placeholder="Organizational Id">
                <input type="password" id="password" class="fadeInDown" name="password" placeholder="password">
                <input type="submit" id="submit" class="fadeInDown" value="Log In" name="submit">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="View/forgot.php">Forgot Password?</a>
            </div>

        </div>
    </div>

<script type="text/javascript">

       const name = document.getElementById('name');
       const password = document.getElementById('password');
       const form = document.getElementById('form');
       const error = document.getElementById('error');


       form.addEventListener('submit',(e)=>{
            e.preventDefault();
            let messages = [];

            if (name.value === '' || name.value === null) {
                messages.push("name cannot be empty");
            }

            if (password.value === '' || password.value === null) {
                messages.push("password cannot be empty");
            }else{
                if (password.value.length < 6) {
                messages.push("password must be more than");
                }
            }


               error.innerText = messages.join(', ');

       })
</script>
</body>

</html>