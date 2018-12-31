<?php

// Create connection
$conn = new mysqli("localhost", "id8344018_henriwilander", "###qwerty", "id8344018_harjoitustyo");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM user";
$result = $conn->query($sql);
$statement = mysqli_prepare($conn, "SELECT * FROM user");

$response = array();
$user_id = array();
$username = array();
$first_name = array();
$surname = array();
$age = array();
$password = array();
$status = array();
$response["success"] = false; 

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $response["success"] = true;
		$user_id[] = $row["user_id"];
		$username[] = $row["username"];
		$first_name[] = $row["first_name"];
		$surname[] = $row["surname"];
		$age[] = $row["age"];
		$password[] = $row["password"];
		$status[] = $row["status"];
    }

    echo json_encode($user_id);
    echo json_encode($username);
    echo json_encode($first_name);
    echo json_encode($surname);
    echo json_encode($age);
    echo json_encode($password);
    echo json_encode($status);

    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result($statement, $user_id, $username,  $first_name, $surname , $age, $password, $status);

} else {
    echo "0 results";
}

$conn->close();
?>