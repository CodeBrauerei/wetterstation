<?php
/* Tobias Haber | Gabriel Wanzek | WetterStation */
require_once('./php/main.class.php');
$input = 'T1:-5.55!T2:-6.4!T3:-4.2!LF:90!LD:990!BT:-200!WG:30!WR:N!NS:600!LI:1000!';

$parseData = new ParseData($input);
$output = $parseData->generateData();
$data = $parseData->getValue();
?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <div id="top">
            <h1>Wetterstation Daten</h1>
        </div>
        <div class="clearfix"></div>
        <div id="wrapper"> 
            <div id="main">
                <h2><?= $output['wetter'] ?></h2>
                <div class="half-box">
                    <img src="img/wettericons/<?= $output["imgPath"] ?>" alt="" class="icon">

                    <span class="temp"><?= $output["temp"] ?>°C</span>
                </div>
                <div class="half-box lastbox">
                    <ul class="daten">
                        <li>Lufttemperatur 1<span><?= $data[0] ?></span></li>
                        <li>Lufttemperatur 2<span><?= $data[1] ?></span></li>
                        <li>Lufttemperatur 3<span><?= $data[2] ?></span></li>
                        <li>Luftfeuchtigkeit<span><?= $data[3] ?></span></li>
                        <li>Luftdruck<span><?= $data[4] ?></span></li>
                        <li>Bodentemperatur<span><?= $data[5] ?></span></li>
                        <li>Windgeschwindigkeit<span><?= $data[6] ?></span></li>
                        <li>Windrichtung<span><?= $data[7] ?></span></li>
                        <li>Niederschlagsmenge<span><?= $data[8] ?></span></li>
                        <li>Licht<span><?= $data[9] ?></span></li>
                    </ul>

                </div>
            </div>
            <script src="js/vendor/jquery-1.9.1.min.js"></script>
            <script src="js/main.js"></script>
    </body>
</html>