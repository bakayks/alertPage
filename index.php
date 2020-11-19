<?php
    include('functions.php');

    function getJSON() {
        $url = "https://query1.finance.yahoo.com/v10/finance/quoteSummary/";
        $param = "?modules=price";

        $urlPart = $_GET['ticker-name'];

        $json = file_get_contents($url . $urlPart . $param);
        $obj = json_decode($json, true);

        return $obj->result[0];
    }

    function someFunc() {
        $object = getJSON();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alert Page</title>

    <link rel="stylesheet" href="style.css">


</head>
<body>
    <div class="nav">
        <a href="" class="logo">
            <img src="" alt="">
        </a>
    </div> <!-- nav -->


    <div class="input">
        <form id="ticker-form" method="get">
            <input type="text" name="ticker-name" placeholder="Введите тиккер">
            <input type="submit" onclick="someFunc();">
            <br>
            <pre>
            <?php 
                echo object;
            ?>
            </pre>
        </form>
    </div> <!-- input -->

    <div class="content">
        <div class="row">
            <?php $obj ?>
        </div> <!-- row -->
    </div> <!-- content -->
</body>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="script.js"></script>
</html>