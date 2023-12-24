<?php $state = $_GET["state"]; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>图书借阅平台</title>
    <link rel="stylesheet" href="css_js/index.css">
    <?php include 'headfile/navbar.php'; ?>

</head>
<body>

<section class="hero">
    <div class="hero-content">
        <h1>欢迎来到图书借阅平台</h1>
        <p>在这里，您可以找到最新、最热门和最有价值的图书，并以最低的价格租借它们。</p>
        <?php if ($state === 'unlogin'): ?>
            <a href="login_index.php?part=user" class="cta-btn">登录</a>
        <?php endif; ?>

    </div>
</section>

<section class="featured-books">
    <div class="title">
        <h2>特色图书</h2>
    </div>
    <div class="books-container">
        <div class="book">
            <img src="image/books/小王子.jpg" alt="book cover">
            <h3>小王子</h3>
            <p>作者：安东尼·德·圣-埃克苏佩里</p>
        </div>
        <div class="book">
            <img src="image/books/活着.jpg" alt="book cover">
            <h3>活着</h3>
            <p>作者：余华</p>
        </div>
        <div class="book">
            <img src="image/books/平凡的世界.jpg" alt="book cover">
            <h3>平凡的世界</h3>
            <p>作者：路遥</p>
        </div>
    </div>
</section>
<?php if ($state === 'unlogin'): ?>
    <section class="cta">
        <h2>立即加入我们，开始阅读图书！</h2>
        <a href="register_index.php" class="cta-btn">立即注册</a>
        <br>
        <br>
        已有账号？<a href="login_index.php?part=user" >登录</a>
    </section>
<?php endif; ?>

<?php include "headfile/footer.html" ?>

</body>
</html>
