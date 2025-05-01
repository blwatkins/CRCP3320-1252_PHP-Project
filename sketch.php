<!DOCTYPE html>
<?php
require_once './utils.php';

if (isset($_GET['color-hex']) && isset($_GET['color-name'])) {
    $colorHex = $_GET['color-hex'];
    $colorName = $_GET['color-name'];

    // make sure color hex is valid hex
    if (isHexColor($colorHex)) {
        // load colors.json
        $colorData = readColorData();

        // add hex color and name to colors.json
        $colorData[$colorName] = $colorHex;

        // save colors.json
        // encode our JSON array into a JSON string
        $jsonString = json_encode($colorData);

        // write the colors.json file
        file_put_contents('./data/colors.json', $jsonString);
    }

    // optional: check for duplicate colors
} else if (isset($_POST['delete-color-name'])) {
    $colorToDelete = $_POST['delete-color-name'];

    // load colors.json
    $colorData = readColorData();

    // remove the color name from the array
    unset($colorData[$colorToDelete]);

    // save colors.json
    // encode our JSON array into a JSON string
    $jsonString = json_encode($colorData);

    // write the colors.json file
    file_put_contents('./data/colors.json', $jsonString);
}
?>
<html lang="en">
    <head>
        <title>Sketch</title>
        <style>
            body {
                text-align: center;
            }
        </style>
    </head>
    <body style="text-align: center">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/p5@1.11.4/lib/p5.min.js"></script>
        <script type="text/javascript" src="./src/sketch.js"></script>
        <p><a href="./index.php">Home</a></p>
    </body>
</html>
