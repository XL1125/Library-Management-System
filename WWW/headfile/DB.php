<?php
function connDb($dbname)
{
    $servername = "localhost";
    $username = "root";
    $password = "123456";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
