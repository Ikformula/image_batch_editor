<?php
include('PHPImage.php');

$i = 3;
$contestants[0]= array('photo' => '1.jpg', 'name' => 'Contestant Name', 'country' => 'Liberia', 'number' => rand(time(), time() + 900));
$contestants[1]= array('photo' => '2.jpg', 'name' => 'Contestant Name', 'country' => 'Liberia', 'number' => rand(time(), time() + 900));
$contestants[2]= array('photo' => '3.jpg', 'name' => 'Contestant Name', 'country' => 'Liberia', 'number' => rand(time(), time() + 900));
$contestants[3]= array('photo' => '4.jpg', 'name' => 'Contestant Name', 'country' => 'Liberia', 'number' => rand(time(), time() + 900));
foreach($contestants as $contestant) {
    $bg = 'images/'.$contestant['photo'];
    $image = new PHPImage();
    $image->setDimensionsFromImage($bg);
$image->setFont(__DIR__.'/Bebas.ttf');
$image->setTextColor(array(39, 40, 34));

    // select overlay size depending on width of bg
$layover_widths =  [449, 629, 898, 1347, 1796, 2155, 2425, 2694];
    if ($image->getWidth() < 700) {
        $overlay = 'layovers/layover_500.png';
        $c_heights = [226, 267, 326];
        $the_x = 83;
        $font_size = 17;
        $l_o = $layover_widths[0];
    } elseif ($image->getWidth() >= 700 && $image->getWidth() < 1000) {
        $overlay = 'layovers/layover_700.png';
        $c_heights = [316, 375, 456];
        $the_x = 117;
        $font_size = 23;
        $l_o = $layover_widths[1];
    } elseif ($image->getWidth() >= 1000 && $image->getWidth() < 1500) {
        $overlay = 'layovers/layover_1000.png';
        $c_heights = [451, 535, 651];
        $the_x = 17;
        $font_size = 3;
        $l_o = $layover_widths[2];
    } elseif($image->getWidth() >= 1500 && $image->getWidth() < 2000) {
        $overlay = 'layovers/layover_1500.png';
        $c_heights = [677, 802, 977];
        $the_x = 250;
        $font_size = 50;
        $l_o = $layover_widths[3];
    } elseif($image->getWidth() >= 2000 && $image->getWidth() < 2400) {
        $overlay = 'layovers/layover_2000.png';
        $c_heights = [903, 1069, 1303];
        $the_x = 333;
        $font_size = 67;
        $l_o = $layover_widths[4];
    } elseif($image->getWidth() >= 2400 && $image->getWidth() < 2700) {
        $overlay = 'layovers/layover_2400.png';
        $c_heights = [1083, 1283, 1563];
        $the_x = 400;
        $font_size = 80;
        $l_o = $layover_widths[5];
    } elseif($image->getWidth() >= 2700 && $image->getWidth() < 3000) {
        $overlay = 'layovers/layover_2700.png';
        $c_heights = [1219, 1444, 1759];
        $the_x = 450;
        $font_size = 90;
        $l_o = $layover_widths[6];
    } elseif($image->getWidth() > 3000) {
        $overlay = 'layovers/layover_3000.png';
        $c_heights = [1354, 1604, 1954];
        $the_x = 500;
        $font_size = 100;
        $l_o = $layover_widths[7];
    }

//    var_dump(count($c_heights));
//    die();
    $image->draw($bg);
    $image->draw($overlay, '0%', '100%');

//    cut_away is space left at the top of the main picture before the layover at the bottom
$cut_away = $image->getHeight() - $l_o;

//we then add it to the text depths
for ($i = 0; $i < count($c_heights); $i++){
    $c_heights[$i] += $cut_away;
}

    $image->text($contestant['name'], array(
        'fontSize' => $font_size, // Desired starting font size
        'x' => $the_x,
        'y' => $c_heights[0],
//        'width' => 700,
//        'height' => 100,
        'alignHorizontal' => 'center',
        'alignVertical' => 'center',
        'debug' => true
    ));

$image->setTextColor(array(255, 255, 255));
    $image->text($contestant['country'], array(
        'fontSize' => $font_size, // Desired starting font size
        'x' => $the_x,
        'y' => $c_heights[1],
//        'width' => 700,
//        'height' => 100,
        'alignHorizontal' => 'center',
        'alignVertical' => 'center',
        'debug' => true
    ));

    $image->text($contestant['number'], array(
        'fontSize' => $font_size, // Desired starting font size
        'x' => $the_x,
        'y' => $c_heights[2],
//        'width' => 700,
//        'height' => 100,
        'alignHorizontal' => 'center',
        'alignVertical' => 'center',
        'debug' => true
    ));

//$image->show();
    $new_name = $contestant['name'].'_'. $contestant['number'] .'_'. time() . '.jpg';
    $image->save('gen/' . $new_name);
}

echo 'done';
