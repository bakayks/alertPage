<?php
    include('functions.php');


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
        <form id="ticker-form" method="get" enctype="multipart/form-data">
            <input type="text" name="ticker-name" placeholder="Введите тиккер">
            <button name="submit" type="submit" class="btn btn-primary">Добавить</button>
            <br>
            <pre>
            </pre>
        </form>
    </div>
    <?php

        if (isset($_GET["submit"])){

            $url = "https://query1.finance.yahoo.com/v10/finance/quoteSummary/";
            $param = "?modules=price";

            $urlPart = $_GET['ticker-name'];

            //echo
            $json = file_get_contents($url . $urlPart . $param);
            $obj = json_decode($json);

            $longName = $obj->quoteSummary->result[0]->price->longName;
            $symbol = $obj->quoteSummary->result[0]->price->symbol;
            $regularMarketChange = $obj->quoteSummary->result[0]->price->regularMarketChange->fmt;
            $regularMarketChangePercent = $obj->quoteSummary->result[0]->price->regularMarketChangePercent->fmt;
            $regularMarketPrice = $obj->quoteSummary->result[0]->price->regularMarketPrice->raw;

            echo $longName.'<br>';
            echo $symbol.'<br>';
            echo $regularMarketChange.'<br>';
            echo $regularMarketChangePercent.'<br>';
            echo $regularMarketPrice.'<br>';

            return $obj->result[0];

        }
    ?>
    <div class="content">
        <div class="row">

        </div> <!-- row -->
    </div> <!-- content -->
</body>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="script.js"></script>
</html>