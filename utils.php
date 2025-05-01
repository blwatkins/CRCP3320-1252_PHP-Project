<?php
function isHexColor($color) {
    $match = preg_match("/^#[0-9A-Z]{6}$/", $color);
    return $match === 1;
}

function readColorData() {
    $jsonString = file_get_contents('./data/colors.json');
    $colors = array();

    if ($jsonString) {
        $colors = json_decode($jsonString, true);
    }

    return $colors;
}
?>
