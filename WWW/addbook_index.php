
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>图书上架</title>
    <?php include 'headfile/navbar.php'; ?>
    <link rel="stylesheet" type="text/css" href="css_js/addbook.css">
</head>
<body>
<div class="addbook">
    <form method="POST" action="addbook.php" enctype="multipart/form-data">
        <label for="name">图书编号：</label>
        <input type="text" id="id" name="id"><br>

        <label for="name">图书名：</label>
        <input type="text" id="name" name="name"><br>

        <label for="author">作者：</label>
        <input type="text" id="author" name="author"><br>

        <label for="class">类别：</label>
        <input type="text" id="class" name="class"><br>

        <label for="image">封面：</label>
        <input type="file" id="image" name="image"><br>

        <input type="submit" name="addbook" value="上架图书">
    </form>
</div>
<script src="css_js/code.js"></script>
</body>
</html>
