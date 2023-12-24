<!DOCTYPE html>
<html>
<head>
    <?php include 'headfile/navbar.php'; ?>
    <title>图书管理系统</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgba(205, 230, 250, 0.89);
        }
        .main{
            margin-top: 200px;
            display: flex;
            justify-content: space-around;
        }
        .module {
            width: 600px;
            height: 500px;
            background-color: rgba(242, 242, 242, 0.7);
            margin: 20px;
            text-align: center;
            line-height: 150px;
            cursor: pointer;
            transition: background-color 0.3s ease-in;
        }
        #recomm{
            background-image: url("./image/recomm.png");
            background-size:  cover;
        }
        #info{
            background-image: url("./image/info.png");
            background-size:  cover;
        }
        #return{
            background-image: url("./image/return.png");
            background-size:  cover;
        }
        .module:hover {
            background-color: rgba(245, 243, 238, 0.85);
        }

    </style>
</head>
<body>
<div class="main">
    <div class="module" id="recomm" onclick="location.href='recommendations.php'"></div>
    <div class="module" id="info" onclick="location.href='bookinfo_index.php'"></div>
    <div class="module" id="return" onclick="location.href='bookreturn_index.php'"></div>

</div>
</body>
</html>
