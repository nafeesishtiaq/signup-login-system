<?php
    session_start();
    
    // Include database connection file
    include 'connect.php';

    // Enable error reporting for debugging
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Check if the connection was successful
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }

    if (isset($_POST['signUp'])) {
        $firstname = $_POST['fName'];
        $lastname = $_POST['lName'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Encrypt password
        $password = md5($password);

        // Check if email already exists
        $checkEmail = "SELECT * FROM users WHERE email='$email'";
        $result = $con->query($checkEmail);

        if ($result->num_rows > 0) {
            echo "Email Address Already Exists!";
        } else {
            // Insert user into the database
            $insertQuery = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')";

            if ($con->query($insertQuery) === TRUE) {
                header("location: index.php");
            } else {
                echo "Error: " . $con->error;
            }
        }
    }

    if (isset($_POST['signIn'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password = md5($password);

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = $con->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['email'] = $row['email'];
            header("Location: homepage.php");
            exit();
        } else {
            echo "Incorrect Email or Password";
        }
    }
?>
