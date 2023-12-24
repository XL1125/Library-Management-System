<?php

include "headfile/DB.php";
$conn = connDb('users');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password !== $confirmPassword) {
        echo "<script> alert('密码和确认密码不匹配，请重新输入。')</script>";
        header("refresh:1;url=register_index.php");
    } else {
        $sql = "INSERT INTO info (account, password) VALUES ('$username', '$password')";
        if ( $conn->query($sql)) {
            echo "<script> alert('注册成功')</script>";
            header("refresh:1;url=login_index.php");
        } else {
            echo "<script> alert('注册失败')</script>";
            header("refresh:1;url=register_index.php");
        }
    }
}

mysqli_close($conn);
