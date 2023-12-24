<?php
include "headfile/DB.php";
$conn = connDb('users');
//随机数组
function randArr($min, $max, $count)
{
    //获取数集
    $numbers = range($min, $max);
//    打乱数组中所有元素的顺序
    shuffle($numbers);
//    截取子数组
    return array_slice($numbers, 0, $count);
}
//图书ID 1~6，一共6本
$arr = randArr(1, 6, 6);
function getRet($index)
{
    global $conn;
    global $arr;

    $sql = "SELECT * FROM books WHERE id =" . $arr[$index];

//获取sql语句结果集
    $result = $conn->query($sql);
//从结果集中获取一行数据并以关联数组的形式返回
    $row = $result->fetch_assoc();
    return $row;
}

function disPlay($book)
{
    echo <<<HTML
<div class="book">
    <img src="{$book['image_path']}" alt="book cover">
    <h3>《{$book['name']}》</h3>
    <p>作者：{$book['author']}</p>
</div>
HTML;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>图书推荐</title>
    <link rel="stylesheet" href="css_js/index.css">
    <?php include 'headfile/navbar.php'; ?>

</head>
<body>

<section class="featured-books">
    <div class="title">
        <h2>推荐图书</h2>
    </div>
    <div class="books-container">
        <?php
        for ($i = 0; $i < 3; $i++) {
            disPlay(getRet($i));
        }
        ?>
    </div>
    <div class="books-container">
        <?php
        for ($i = 3; $i < 6; $i++) {
            disPlay(getRet($i));
        }
        ?>
    </div>
</section>
</body>
</html>
