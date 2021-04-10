<?php
require_once '../Model/DbConnect.php';

if (isset($_POST['Submit'])) {
    
    echo $email = $_POST['email'];
    echo $oldpass = $_POST['oldpass'];
    echo $newpass = $_POST['newpass'];
    echo $cpass = $_POST['cpass'];

    $conn = db_conn();
    $selectQuery = "SELECT email, password FROM `users` WHERE email='$email' AND password='$oldpass'";

       $stmt = $conn->prepare($selectQuery);
       $stmt->execute();
       $row   = $stmt->fetch(PDO::FETCH_ASSOC);
       $count = $stmt->rowCount();

       if($count > 0){
        
        $selectQuery = "UPDATE  `users` set email='$newpass' WHERE  email='$email'";

           $stmt = $conn->prepare($selectQuery);
           $stmt->execute();
       }

}



?>