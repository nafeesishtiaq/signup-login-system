<!--To establish connection to database-->
<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "signed_up_users";
    
    // Create connection
    $con = new mysqli($host, $user, $password, $database, 3307);

    // Check connection
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
?>
