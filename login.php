<?php
    $con = mysqli_connect("localhost", "id8344018_henriwilander", "###qwerty", "id8344018_harjoitustyo");
    
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM user WHERE username = ? AND password = ?");
    mysqli_stmt_bind_param($statement, "ss", $username, $password);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $user_id, $username,  $first_name, $surname , $age, $password, $status);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;
        $response["id"] = $user_id; 
        $response["username"] = $username;
        $response["first_name"] = $first_name;
        $response["surname"] = $surname;
        $response["age"] = $age;
        $response["password"] = $password;
        $response["status"] = $status;
    }
    
    echo json_encode($response);
?>