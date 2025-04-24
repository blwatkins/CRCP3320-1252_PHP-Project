<!DOCTYPE html>
<?php
function buildColorCard($backgroundColor) {
echo '<div class="card m-2" style="width: 15rem;">';
echo '<div class="card-body">';
echo '<div style="background:' . $backgroundColor . '; height: 15rem"></div>';
echo '<button type="button" class="btn btn-danger mt-2">Delete</button>';
echo '</div>';
echo '</div>';
}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Color Selection</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    </head>
    <body>
        <h1 class="text-center m-3">Colors</h1>
        <hr/>
        <div class="container">
            <?php
                $jsonString = file_get_contents('./data/colors.json');
                $colors = array();

                if ($jsonString) {
                    $colors = json_decode($jsonString, true);
                }


                foreach ($colors as $name => $hex) {
                    buildColorCard($hex);
                }
            ?>
            <div class="card m-2" style="width: 15rem;">
                <div class="card-body">
                    <div style="background: red; height: 15rem"></div>
                    <button type="button" class="btn btn-danger mt-2">Delete</button>
                </div>
            </div>
            <div class="card m-2" style="width: 15rem;">
                <div style="background: blue; height: 15rem"></div>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
            <div class="card m-2" style="width: 15rem;">
                <div style="background: yellow; height: 15rem"></div>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
            <div class="card m-2" style="width: 15rem;">
                <div style="background: green; height: 15rem"></div>
                <button type="button" class="btn btn-danger">Delete</button>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    </body>
</html>
