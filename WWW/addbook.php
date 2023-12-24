<?php
require "headfile\DB.php";
$conn = connDb('users');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $id = $_POST["id"];
    $author = $_POST["author"];
    $class = $_POST["class"];
    $targetPath = '';

    if (isset($_FILES['image'])) {
        $file = $_FILES['image'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];

        $uploadDirectory = 'image/books/';
//    将上传的图书封面文件保存的路径
        $targetPath = $uploadDirectory . $fileName;

        if (move_uploaded_file($fileTmpName, $targetPath)) {
            $sql = "INSERT INTO books (name, id ,author, class, image_path) VALUES ('$name', '$id', '$author', '$class', '$targetPath')";
            if ($conn->query($sql) === TRUE) {
                echo "<script> alert('图书上架成功!')</script>";
                header("refresh:0;url=addbook_index.php");
            } else {
                echo "插入数据时出现错误: " . $conn->error;
            }

        } else {
//            echo "图片保存失败。";
            $targetPath = "暂无图片";
            $sql = "INSERT INTO books (name, id ,author, class, image_path) VALUES ('$name', '$id', '$author', '$class', '$targetPath')";
            if ($conn->query($sql) === TRUE) {
                echo "<script> alert('图书上架成功!')</script>";
                header("refresh:0;url=addbook_index.php");
            } else {
                echo "插入数据时出现错误: " . $conn->error;
            }
        }
    }
}
$conn->close();
?>