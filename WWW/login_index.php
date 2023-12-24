<?php
// 鉴别用户与管理员
$part = $_GET["part"];
if ($part === 'user') {
    $displaypart = '用户登录';
} elseif ($part === 'admin') {
    $displaypart = '管理员登录';
}

// 检查是否存在记住密码的cookie
$remembered = isset($_COOKIE['remembered']) ? $_COOKIE['remembered'] : false;
$accountValue = '';
$passwordValue = '';

if ($remembered) {
    // 如果存在记住密码的cookie，从cookie中获取账号和密码的值
    $accountValue = isset($_COOKIE['account']) ? $_COOKIE['account'] : '';
    $passwordValue = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $displaypart; ?></title>
    <?php include 'headfile/navbar.php'; ?>
    <link rel="stylesheet" type="text/css" href="css_js/login_form.css">
</head>
<body>
<div>
    <form action="login.php" method="POST">
        <h2><?php echo $displaypart; ?></h2>
        <input type="text" id="account" name="account" placeholder="账号" value="<?php echo $accountValue; ?>" required>
        <br><br>

        <div class="password-toggle" style="position: relative;">
            <input type="password" id="password" name="password" placeholder="密码" value="<?php echo $passwordValue; ?>" required>
            <span class="toggle-icon" id="eye" style="position: absolute; top: 8px; right: 5px;"
                  onclick="togglePassword()">👁️</span>
        </div>

        <input type="hidden" name="role" value="<?php echo $part; ?>">
        <label for="remember">
            <input type="checkbox" id="remember" name="remember" <?php if ($remembered) { echo 'checked'; } ?>>
            记住密码
        </label>
        <br><br>
        <button type="submit">登录</button>
        <?php if ($displaypart != '管理员登录'): ?>
            <a href=register_index.php> 注册</a>
        <?php endif; ?>
    </form>
</div>
<script src="css_js/code.js"></script>
</body>
</html>
