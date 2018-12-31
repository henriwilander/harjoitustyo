<?php
    $con = mysqli_connect("localhost", "id8344018_henriwilander", "###qwerty", "id8344018_harjoitustyo");
        $first_name = $_POST["first_name"];
        $surname = $_POST["surname"];
        $age = $_POST["age"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $statement = mysqli_prepare($con, "INSERT INTO user (first_name, surname, username, age, password) VALUES (?, ?, ?, ?,?)");
        mysqli_stmt_bind_param($statement, "sssis", $first_name, $surname, $username, $age, $password);
        mysqli_stmt_execute($statement);
    
        $response = array();
        $response["success"] = true;  
    
        echo json_encode($response);
?>
