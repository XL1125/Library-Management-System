<?php
require "headfile\DB.php";

$conn = connDb('users');

session_id('user');
session_start();

$role = $_POST['role'];
$account = $_POST["account"];
$password = $_POST["password"];
$sql = "SELECT * FROM info WHERE account='$account' AND password='$password'";
//获取sql语句结果集
$result = $conn->query($sql);
//从结果集中获取一行数据并以关联数组的形式返回
$row = $result->fetch_assoc();


if ($role === 'user') {
    //用户登录
    if ($result->num_rows > 0) {
        if ($row["role"] === 'admin') {
            echo "<script> alert('管理员账号请用控制台登录!')</script>";
            header("refresh:1;url=login_index.php?part=admin");
        } else {
            $_SESSION['username'] = $row["id"];
            $_SESSION['user'] = $row["account"];
            $_SESSION['role'] = $row["role"];
            header('Location:private.php ');
        }
    } else {
        echo "<script> alert('用户名或密码错误!')</script>";
        header("refresh:1;url=login_index.php?part=user");
    }
} //管理员登录
elseif ($role === 'admin') {
    if ($result->num_rows > 0) {
        if ($row["role"] === 'user') {
            echo "<script> alert('无管理员权限!')</script>";
            header("refresh:1;url=login_index.php?part=admin");
        } else {
            $_SESSION['username'] = $row["id"];
            $_SESSION['role'] = $row["role"];
            header('Location:addbook_index.php ');
        }

    } else {
        echo "<script> alert('用户名或密码错误!')</script>";
        header("refresh:1;url=login_index.php?part=admin");

    }
}

// 检查是否勾选了记住密码
if (isset($_POST['remember'])) {
    // 设置记住密码的cookie，有效期为1周
    setcookie('remembered', true, time() + (7 * 24 * 60 * 60));
    // 设置账号和密码的cookie
    setcookie('account', $_POST['account'], time() + (7 * 24 * 60 * 60));
    setcookie('password', $_POST['password'], time() + (7 * 24 * 60 * 60));
} else {
    // 如果没有勾选记住密码，删除之前设置的cookie
    setcookie('remembered', false, time() - 3600);
    setcookie('account', '', time() - 3600);
    setcookie('password', '', time() - 3600);
}


$conn->close();

