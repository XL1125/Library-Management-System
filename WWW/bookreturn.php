<?php
require "headfile\DB.php";
$conn = connDb('users');

// 从表单中获取要归还的图书id
$bookId = $_POST['id'];

// 获取当前页码
$current_page = $_POST['current_page'];

// 将图书状态修改为“未借阅”，账户信息修改为“NULL”
$sql_update = "UPDATE books SET state='未借阅', account=NULL WHERE id='$bookId'";
if ($conn->query($sql_update) === TRUE) {
    echo "图书归还成功！";
} else {
    echo "Error: " . $sql_update . "<br>" . $conn->error;
}

// 关闭数据库连接
$conn->close();

// 重定向回还书页面
header("Location: bookreturn_index.php?page=$current_page");
?>
