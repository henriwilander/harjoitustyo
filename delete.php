<?php
    $con = mysqli_connect("localhost", "id8344018_henriwilander", "###qwerty", "id8344018_harjoitustyo");
    
	$user_id =$_POST["user_id"];

	$statement = mysqli_prepare($con, "DELETE FROM user WHERE user_id = ?");
    mysqli_stmt_bind_param($statement, "i", $user_id);
    mysqli_stmt_execute($statement);

    $response = array();
    $response["success"] = true;  
    
    echo json_encode($response);
?>