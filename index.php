<?php
include('functions.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alert Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">


</head>
<body>
<div class="nav">
    <a href="" class="logo">
        <img src="" alt="">
    </a>
</div> <!-- nav -->

<div class="container">
    <div class="input">
        <form id="ticker-form" class="form-inline" method="get" enctype="multipart/form-data">
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" class="form-control" name="ticker-name" placeholder="Введите тиккер">
            </div>
            <a name="submit" type="submit" ><img src="https://static.tildacdn.com/tild6437-3861-4736-a663-363438623137/krest.svg" alt=""></a>
        </form>
    </div>
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

</div>
<div class="content">
    <div class="row">

    </div> <!-- row -->
</div> <!-- content -->
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="script.js"></script>
</html>