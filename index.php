<?php
include('functions.php');

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


}

echo '<!DOCTYPE html>
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
    <div class="row">
        <div class="nav center" >
            <a href="#" class="logo">
                <img src="images/logo-png.png" alt="" style="width: 20vh">
            </a>
            <a href="#" id="refresh" style="margin-top:10px; margin-left: 5px; text-decoration: none; color: grey">Обновить котировки</a>
        </div>
    </div>


    <div class="input center">
        <form id="ticker-form" method="get" enctype="multipart/form-data" class="form-inline">
            <input type="text" class="form-control" name="ticker-name" placeholder="Введите тиккер" style="margin-left: -10px;
                padding-right: 75px; background-color: #dcdcdc">
            <div class="input-group-append">
                <button style="border: none; background: transparent" name="submit" type="submit"><img id="plus"
                                                                                                       style="width: 30px; transform: rotate(45deg); "
                                                                                                       src="https://static.tildacdn.com/tild6437-3861-4736-a663-363438623137/krest.svg" alt="">
                </button>
            </div>
        </form>
    </div>

    <form name="registration_form" id="registration_form" class="form-horizontal center">
        <div class="form-inline" style="margin-left: -25px">
            <div class="col-sm-2" style="margin-right: 8%; pa">
                <input id="firstname" class="form-control input-group-lg reg_name" type="text" name="firstname"
                       style="width: 125px; background-color: #dcdcdc"">
            </div>
            <div class="col-sm-2">
                <input id="lastname" class="form-control input-group-lg reg_name" type="text" name="lastname"
                       style="width: 125px; background-color: #dcdcdc"">
            </div>
            <button style="border: none; background: transparent; padding-left: 52px" name="submit" type="submit"><img
                        style="width: 30px; transform: rotate(45deg)"
                        src="https://static.tildacdn.com/tild6437-3861-4736-a663-363438623137/krest.svg" alt="">
            </button>
        </div>
    </form>

    <div>
        <div class="d-block p-3 w-50 text-white" style="border-radius: 8px; background-color: #4C4C4C; margin-left: auto; margin-right: auto;">
            <div class="row">
                <h5 class="col-md-6" ><small>' . $longName . '</small></h5>
                <h5 class="col-md-3"><small>' . $regularMarketPrice . '</small></h5>
                <h6 class="col-md-3" style="color: #D39392;"><small>' . $regularMarketChange.' ('. $regularMarketChangePercent . ')</small></h6>
            </div>
            <div class="row">
                <div class="d-block p-2 col-sm-2 col-md-2 col-lg-2" style="border-radius: 8px; background-color: #D39392; margin-left: auto; margin-right: auto;">
                    <span style="color: #4C4C4C;">150</span>
                </div>
                <div class="d-block p-2 text-black col-sm-2 col-md-2 col-lg-2" style="border-radius: 8px; background-color: #B5C490; margin-left: auto; margin-right: auto;">
                    <span style="color: #4C4C4C;">10.1</span>
                </div>
                <div class="d-block p-2 text-black col-sm-2 col-md-2 col-lg-2" style="border-radius: 8px; background-color: #DBDBDB; margin-left: auto; margin-right: auto;">
                    <span style="color: #4C4C4C;">25.4</span>
                </div>
                <div class="d-block p-2 text-black col-sm-2 col-md-2 col-lg-2" style="border-radius: 8px; background-color: #DBDBDB; margin-left: auto; margin-right: auto;">
                    <span style="color: #4C4C4C;">asd</span>
                </div>
            </div>
        </div>
    </div>';


    echo '<div class="content">
        <div class="row">

        </div>
    </div>
</body>

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="script.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></scrip
    t>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
</html>'

?>