<?php

function calcc($l_height){
    $c_p = [50.26, 59.54, 72.53];
    echo '[';
    foreach($c_p as $p){
        echo round(($p/100) * $l_height) . ', ';
    }
    echo '];';
    echo '<br>';
}

function calc_x(){
    $c_p = [500, 700, 100, 1500, 2000, 2400, 2700, 3000];
    foreach($c_p as $p) {
        echo '<br>';
        echo '$the_x = '.round(($p / 6)).'; <br> $font_size = '. round($p / 30).'; <br>';
    }
}

$heights = [449, 629, 898, 1347, 1796, 2155, 2425, 2694];
//foreach ($heights as $height){
//    calcc($height);
//}

echo '<br>';
calc_x();