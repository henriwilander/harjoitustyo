<?php
     $con = mysqli_connect("localhost", "id8344018_henriwilander", "###qwerty", "id8344018_harjoitustyo");
        $first_name = $_POST["first_name"];
        $surname = $_POST["surname"];
        $age = $_POST["age"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $status = $_POST["status"];
        $user_id =$_POST["user_id"];

        $statement = mysqli_prepare($con, "UPDATE user SET username = ?,
        first_name = ?,
        surname = ?,
        password = ?,
        age = ?,
        status = ? WHERE user_id = ?");
        
        mysqli_stmt_bind_param($statement, "ssssiii", $username, $first_name, $surname, $password, $age, $status, $user_id);
        mysqli_stmt_execute($statement);
    
        $response = array();
        $response["success"] = true;  
    
        echo json_encode($response);
?>