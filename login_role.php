<?php
include('cnx_database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($cnx, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
    
        if ($row) {
            $hashedPassword = $row['password'];
    
            if ($row["usertype"] == "admin") {
                header("location: clients.php");
            } else if ($row["usertype"] == "client") {
                header("location: agency.php");
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


