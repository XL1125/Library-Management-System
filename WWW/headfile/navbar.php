<!--navbar.php-->
<style>
    /* 导航栏样式 */
    .navbar {
        background-color: #333;
        overflow: auto;

        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
    }

    .navbar a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .navbar a:hover {
        background-color: #ddd;
        color: black;
    }

    nav {
        display: flex;
        align-items: center;
        background-color: rgb(240, 248, 255); /* 淡蓝色背景 */
        padding: 10px;
    }

    .links {
        margin-right: auto; /* 将 links 推向左边 */
    }

    .links a,
    .user a {
        color: #333; /* 文字颜色 */
        text-decoration: none; /* 去除链接下划线 */
        margin-right: 10px; /* 链接之间的右边距 */
        transition: color 0.3s; /* 添加过渡效果 */
    }

    .links a:hover,
    .user a:hover {
        color: #66a9f1; /* 鼠标悬停时的文字颜色 */
    }

    .user {
        margin-left: auto; /* 将 user 推向右边 */
    }

    .logo a {
        padding: 0 0;
        margin-right: 20px; /* 链接之间的右边距 */

    }

    .logo img {
        max-width: 50px; /* 设置最大宽度 */
        height: auto; /* 保持宽高比例 */
    }

    input[name="logout"] {
        background-color: rgb(236, 47, 47);
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    input[name="logout"]:hover {
        background-color: #d51616;
    }


</style>

<?php
session_id('user');
session_start();
// 检查用户是否已登录
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = 'null'; // 默认显示为 "登录" 文本
}

// 用户注销
if (isset($_POST['logout'])) {
    // 清除会话中的用户名
    unset($_SESSION['username']);
    // 重定向到首页
    header('Location:index.php ');
    exit();
}


?>

<!-- 导航栏 -->
<div class="navbar">
    <nav>
        <div class="logo">
            <a href="#"><img src="../image/logo.png" alt="Logo"></a>
        </div>
        <!--        陌生人-->
        <?php if ($username === 'null'): ?>
        <div class="links">
            <a href="../index.php?state=unlogin">首页</a>
            <a href="../recommendations.php?state=unlogin">图书推荐</a>
        </div>
        <div class="user">
            <a href="../login_index.php?part=user">我的图书馆</a>
            <a href="../login_index.php?part=admin">控制台</a>
            <!--            普通用户-->
            <?php elseif (isset($_SESSION['username']) && $_SESSION['role'] != 'admin'): ?>
                <div class="links">
                    <a href="../private.php">主页</a>
                    <a href="../recommendations.php?state=logined">图书推荐</a>
                    <a href="../bookinfo_index.php">浏览图书</a>
                    <a href="../bookreturn_index.php">图书归还</a>
                </div>
                <form method="post">
                    <div class="user">
                        <!-- 显示用户名 -->
                        <span><?php echo $username; ?></span>
                        <!-- 显示退出登录按钮 -->
                        <input type="submit" name="logout" value="注销">
                </form>
                <!--            管理员-->
            <?php elseif (isset($_SESSION['username']) && $_SESSION['role'] === 'admin'): ?>
                <div class="links">
                    <a href="../index.php?state=admin">首页</a>
                    <a href="../addbook_index.php">图书上架</a>
                </div>
                <form method="post">
                    <div class="user">
                        <!-- 显示用户名 -->
                        <span><?php echo $username; ?></span>
                        <!-- 显示退出登录按钮 -->
                        <input type="submit" name="logout" value="注销">
                </form>
            <?php endif; ?>

        </div>
    </nav>


</div>