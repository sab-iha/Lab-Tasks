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
            <form method="POST" action="../controller/signup.php" enctype="multipart/form-data">
                <input type="text" id="name" class="fadeInDown" name="name" placeholder="name"><br><br>
                <input type="text" id="email" class="fadeInDown" name="email" placeholder="email"><br><br>
                Male
                <input type="radio" id="male" class="fadeInDown" name="gender" value="male">
                Female
                <input type="radio" id="female" class="fadeInDown" name="gender" value="female"><br><br>
                <input type="password" id="password" class="fadeInDown" name="password" placeholder="password"><br><br>
                <input type="file" name="image"><br><br>

                <input type="submit" class="fadeInDown" value="Sign In" name="register">
            </form>

            <!-- Remind Passowrd -->
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>

        </div>
    </div>

</body>

</html>