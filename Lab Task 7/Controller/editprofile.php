<?php
require_once '../Model/DbConnect.php';
require_once '../Model/model.php';


session_start();

     /**
      * relogin system using cookie
      */

      if ( isset($_COOKIE['user_login_id']) ) {
          
          $user_id = $_COOKIE['user_login_id'];
          $sql = "SELECT * FROM users WHERE ID = '$user_id'";
          $conn = db_conn();

              $stmt = $conn->prepare($sql);
              $stmt->bindParam('name', $name, PDO::PARAM_STR);
              $stmt->execute();

              $row   = $stmt->fetch(PDO::FETCH_ASSOC);
          
          /**
           * set session data for relogin
           */
          $_SESSION['ID'] =  $row['ID'] ;
          $_SESSION['name'] =  $row['name'] ;
          $_SESSION['email'] =  $row['email'] ;
          $_SESSION['photo'] =  $row['photo'] ;

          /**
           * redirect to dashboard page
           */
          header('location:dashboard.php');


      }


    /**
     * Check if session is set to not allow Index page access when user is already logged in
     */
    if (isset($_SESSION['ID']) AND isset($_SESSION['name']) AND isset($_SESSION['email']) ) {
      
      header('location:dashboard.php');
    }



if (isset($_POST['submit'])) {
          
    //value get
      $password = ' ';
      $name =  $_POST['name'];
      $password = $_POST['password'];

      

      //validation for the fields
      if (empty($name) || empty($password)) {
          echo $mess = '<p style="background-color:red;"> All fields required! <button data-dismiss="alert" class="close"> &times; </button></p>';
           //header('location:login.php');
      }else{
           

           // check using the username or email
           $conn = db_conn();
           $selectQuery = "SELECT * FROM `users` WHERE name='$name' OR password='$password'";

              $stmt = $conn->prepare($selectQuery);
              $stmt->bindParam('name', $name, PDO::PARAM_STR);
              $stmt->execute();

              $row   = $stmt->fetch(PDO::FETCH_ASSOC);
              $count = $stmt->rowCount();

             
           if ($count == 1 ) {

            echo"</br>";
            echo $count;
                
            $hash = $row['password'];
               // if the user count is 1 it means found, then check the password
               $pass_verify = password_verify($password, $hash); 
                

               if ($pass_verify) {
                   
                   //pass the data into the session to acess and show profile info
                  
              
                   $_SESSION['ID'] =  $row['ID'] ;
                   $_SESSION['name'] =  $row['name'] ;
                   $_SESSION['email'] =  $row['email'] ;  
                   

                   /**
                    * set cookie value 
                    */

                   setcookie('user_login_id', $row['ID'], time() + (60*60*24*365*2) );

                   /**
                    * redirect to profile page
                    */
                   header('location:dashboard.php');
               }else{

                   echo $mess = '<p class="alert alert-danger"> Wrong password! <button data-dismiss="alert" class="close"> &times; </button></p>';
               }

           }else{

               echo $mess = '<p class="alert alert-danger"> Wrong username or email! <button data-dismiss="alert" class="close"> &times; </button></p>';
           }
      }

     

}





















?>