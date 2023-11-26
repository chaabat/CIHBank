<?php

$servername ="localhost";
$username ="root";
$password = "";
$dbname = "cihbank";


$cnx = new mysqli($servername,$username,$password,$dbname);

// if ($cnx->connect_error) {
//     echo "Error connecting";
// }else {
// 	echo "Connected successfully";
// }

// if($_SERVER["REQUEST_METHOD"] == "POST"){
// 	$username = $_POST["email"];
// 	$password = $_POST["password"];

// 	$sql = "SELECT * FROM login_user WHERE username = '$username' AND password = '$password'";
// 	$result = mysqli_query($cnx,$sql);
// 	$row = mysqli_fetch_array($result);
// 	if($row["usertype"]=="admin"){
// 		echo "admin ";

// 	}elseif($row["usertype"]=="user"){
// 		echo "user ";

// 	}else{
// 		echo "email and password are not correct";
// 	}
// };

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM login_user WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($cnx, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);

        if ($row) {
            if ($row["usertype"] == "admin") {
                // echo "admin";
				header("location:clients.php");

            } else if ($row["usertype"] == "user") {
                // echo "user";
				header("location:agency.php");

            } else {
                echo "Unknown user type";
            }
        } else {
            // echo "Email and password are not correct";
        }
    } else {
        echo "Query failed: " . mysqli_error($cnx);
    }
};


?>