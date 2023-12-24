<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>注册</title>
    <link rel="stylesheet" type="text/css" href="css_js/login_form.css">
    <?php include 'headfile/navbar.php'; ?>

</head>
<body>

<form action="register.php" method="post">
    <h2>注册</h2>
<!--    账号-->
    <input type="text" id="username" name="username" placeholder="账号" required>
    <br><br>
<!--    密码-->
    <div class="password-toggle" style="position: relative;">
        <input type="password" id="password" name="password" placeholder="密码" required>
        <span class="toggle-icon" id="eye" style="position: absolute; top: 8px; right: 5px;" onclick="togglePassword()">👁️</span>
    </div>
    <br>
    <!-- 确认密码 -->
    <div class="password-toggle" style="position: relative;">
        <input type="password" id="confirm_password" name="confirm_password" placeholder="确认密码" required>
        <span class="toggle-icon" id="eye_confirm" style="position: absolute; top: 8px; right: 5px;" onclick="togglePasswordConfirm()">👁️</span>
    </div>
    <br><br>
    <button type="submit">确认注册</button>
    <a href="login_index.php">返回登录</a>

</form>
<script src="css_js/code.js"></script>
</body>
