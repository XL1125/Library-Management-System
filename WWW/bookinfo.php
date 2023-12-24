<?php
require "headfile\DB.php";
session_start();
// 获取要借阅的图书ID
$id = isset($_POST['id']) ? $_POST['id'] : '';
// 获取存储在会话中的用户账号
$userAccount = $_SESSION['user'];
if (!empty($id)) {
    // 进行借书操作
    $conn = connDb('users');

    // 查询图书状态
    $sql_select = "SELECT state FROM books WHERE id='$id'";
    $result_select = $conn->query($sql_select);

    if ($result_select->num_rows > 0) {
        $row = $result_select->fetch_assoc();
        $state = $row['state'];

        // 判断图书是否可以借阅
        if ($state == "未借阅") {
            // 更新图书状态
//            $sql_update = "UPDATE books SET state='已借阅' WHERE id='$id'";
//            $result_update = $conn->query($sql_update);
            $sql_update = "UPDATE books SET state='已借阅', account='$userAccount' WHERE id='$id'";
            $result_update = $conn->query($sql_update);
            if ($result_update) {

                echo "借阅成功！";
            } else {
                echo "借阅失败，请稍后重试。";
            }
        } else {
            echo "该图书无法借阅。";
        }
    } else {
        echo "找不到该图书的信息。";
    }

    // 关闭数据库连接
    $conn->close();
} else {
    echo "借阅失败，请选择要借阅的图书。";
}

// 借阅成功后，重定向回图书列表页面，并将当前页码重置为保存的页码或默认为第一页
if (isset($_POST['current_page'])) {
    $redirect_page = "bookinfo_index.php?page=" . $_SESSION['current_page'];  // 使用保存的页码重定向
} else {
    $redirect_page = "bookinfo_index.php";  // 默认回到第一页
}
header("Location: $redirect_page");  // 执行页面重定向
exit;

