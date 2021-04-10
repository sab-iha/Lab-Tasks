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
                <i class="fa fa-user" aria-hidden="true" style="margin:8px 8px 8px"><b>forgot password?</b></i>
            </div>

            
            <!-- Login Form -->
            <?php include_once "../controller/forgotpass.php" ?>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input type="text" id="email" class="fadeInDown" name="email" placeholder="email">
                <input type="password" id="oldpass" class="fadeInDown" name="oldpass" placeholder="old password">
                <input type="password" id="newpass" class="fadeInDown" name="newpass" placeholder="new password">
                <input type="password" id="cpass" class="fadeInDown" name="cpass" placeholder="confirm password">
                <input type="submit" class="fadeInDown" value="change password" name="submit">
            </form>



        </div>
    </div>
</body>

</html>