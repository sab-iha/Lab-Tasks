<?php


require_once 'DbConnect.php';

function addUser($data){
	$conn = db_conn();
    $selectQuery = "INSERT into users (name, email, gender, password, image)
VALUES (:name, :email, :gender, :password, :image)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':name' => $data['name'],
        	':email' => $data['email'],
        	':gender' => $data['gender'],
        	':password' => $data['password'],
        	':image' => $data['image']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}