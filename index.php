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
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="nav">
        <a href="#" class="logo">
            <img src="images/kvaal.svg" alt="" style="height: 70px; width: 150px">
        </a>
        <a href="#" id="refresh">Обновить котировки</a>
    </div>


    <div class="input">
        <form id="ticker-form" method="get" enctype="multipart/form-data">
            <input type="text" name="ticker-name" placeholder="Введите тиккер">
            <button name="submit" type="submit" class="btn btn-primary">Добавить</button>
            <br>
            <pre>
            </pre>
        </form>
    </div>
    <form name="registration_form" id="registration_form" class="form-horizontal">
        <div class="form-inline">
            <div class="col-sm-2" style="margin-right: 5%">
                <label for="firstname" class="sr-only"></label>
                <input id="firstname" class="form-control input-group-lg reg_name" type="text" name="firstname">
            </div>
            <div class="col-sm-2">
                <label for="lastname" class="sr-only"></label>
                <input id="lastname" class="form-control input-group-lg reg_name" type="text" name="lastname">
            </div>
        </div>
    </form>
    <?php

    if (isset($_GET["submit"])) {

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

        echo $longName . '<br>';
        echo $symbol . '<br>';
        echo $regularMarketChange . '<br>';
        echo $regularMarketChangePercent . '<br>';
        echo $regularMarketPrice . '<br>';

        return $obj->result[0];

    }
    ?>
    <div class="content">
        <div class="row">

        </div> <!-- row -->
    </div> <!-- content -->
</div>
</body>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</html>