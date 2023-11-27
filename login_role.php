<?php
include('cnx_database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["email"];
    $password = $_POST["password"];
    // $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($cnx, $sql);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $hashedPassword = $row['password'];

        if ($row) {
            if ($row["usertype"] == "admin") {
                // echo "admin";
				header("location:dashbord.php");

            } else if ($row["usertype"] == "client") {
                // echo "user";
				header("location:user_page.php");

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