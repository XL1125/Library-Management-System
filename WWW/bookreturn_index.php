<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>图书归还</title>
    <?php include 'headfile/navbar.php'; ?>
    <link rel="stylesheet" type="text/css" href="css_js/bookinfo.css">
</head>
<body>
<div class="body">
    <?php
    require "headfile\DB.php";
    $conn = connDb('users');

    session_start();
    $userAccount = $_SESSION['user'];

    // 设置每页显示的记录数
    $page_size = 10;

    // 获取当前页码，默认为第一页
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    // 查询用户借阅的图书总数
    $sql_count = "SELECT COUNT(*) AS total FROM books WHERE account='$userAccount'";
    $result_count = $conn->query($sql_count);
    $row_count = $result_count->fetch_assoc();
    $total_records = $row_count['total'];

    // 计算总页数
    $total_pages = ceil($total_records / $page_size);

    // 对当前页码进行合法性检查
    if ($current_page < 1) {
        $current_page = 1;
    } elseif ($current_page > $total_pages) {
        $current_page = $total_pages;
    }

    // 计算当前页在数据库中的起始位置
    $start_index = ($current_page - 1) * $page_size;

    // 查询用户借阅的图书数据
    $sql = "SELECT * FROM books WHERE account='$userAccount' LIMIT $start_index, $page_size";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        ?>
        <table>
            <tr>
                <th>ID</th>
                <th>图书名</th>
                <th>作者</th>
                <th>类别</th>
                <th>借阅状态</th>
                <th>操作</th>
            </tr>
            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row["id"]; ?></td>
                    <td>《<?php echo $row["name"]; ?>》</td>
                    <td><?php echo $row["author"]; ?></td>
                    <td><?php echo $row["class"]; ?></td>
                    <td><?php echo $row["state"]; ?></td>
                    <td>
                        <?php if ($row["state"] == "已借阅") {
                            // 在归还按钮点击时保存当前页码到 session 中
                            $_SESSION['current_page'] = $current_page;
                            ?>
                            <form method="post" action="bookreturn.php">
                                <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
                                <input type="hidden" name="current_page" value="<?php echo $current_page; ?>">
                                <button type="submit">归还</button>
                            </form>
                        <?php } else {
                            echo "无法归还";
                        } ?>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <div class="pagination">
            <?php
            // 计算首页和尾页的页码范围
            $start_page = max(1, $current_page - 1); // 首页的页码
            $end_page = min($total_pages, $current_page + 1); // 尾页的页码

            // 显示首页按钮
            if ($current_page > 1) {
                echo "<a href='{$_SERVER['PHP_SELF']}?page=1'>首页</a>";
            }

            // 显示省略号
            if ($start_page > 1) {
                echo "<span class='ellipsis'>...</span>";
            }

            // 显示页码
            for ($i = $start_page; $i <= $end_page; $i++) {
                if ($i == $current_page) {
                    echo "<span class='current'>$i</span>";
                } else {
                    echo "<a href='{$_SERVER['PHP_SELF']}?page=$i'>$i</a>";
                }
            }

            // 显示省略号
            if ($end_page < $total_pages) {
                echo "<span class='ellipsis'>...</span>";
            }

            // 显示尾页按钮
            if ($current_page < $total_pages) {
                echo "<a href='{$_SERVER['PHP_SELF']}?page=$total_pages'>尾页</a>";
            }
            ?>

        </div>
    <?php } else {
        echo "您还没有借阅任何图书。";
    }

    // 关闭数据库连接
    $conn->close();
    ?>
</div>
</body>
</html>