<!DOCTYPE html>
<?php
function buildColorCard($backgroundColor, $colorName) {
echo '<div class="card m-2" style="width: 15rem;">';
echo '<div class="card-body">';
echo '<div style="background:' . $backgroundColor . '; height: 15rem"></div>';
echo '<p>' . $colorName . '</p>';
echo '<form method="post" action="./sketch.php">';
echo '<input type="text" name="delete-color-name" id="delete-color-name" value="' . $colorName . '" hidden/>';
echo '<input type="submit" value="Delete" class="btn btn-danger mt-2"/>';
echo '</form>';
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
        <script>
            function showForm() {
                let colorForm = document.getElementById('color-form-container');
                colorForm.style.display = 'flex';
            }

            function updateFormColor() {
                let colorInput = document.getElementById('color-hex');
                let inputValue = colorInput.value;
                let hexPattern = /^#[0-9A-Z]{6}$/;
                let match = hexPattern.test(inputValue);
                let colorBlock = document.getElementById("form-color-block");
                let submit = document.getElementById('form-submit');

                if (match) {
                    colorBlock.style.background = inputValue;
                    submit.toggleAttribute('disabled', false);
                } else {
                    colorBlock.style.background = 'black';
                    submit.toggleAttribute('disabled', true);
                }
            }
        </script>
        <h1 class="text-center m-3">Colors</h1>
        <hr/>
        <div class="container text-center">
            <button onclick="showForm();" type="button" class="btn btn-primary mt-2">Add a Color</button>
        </div>
        <div id="color-form-container" class="container" style="display: none">
                <div class="card m-2" style="width: 15rem;">
                    <div class="card-body">
                        <div id="form-color-block" style="background: #000000; height: 15rem"></div>
                        <form id="new-color-form" method="get" action="./sketch.php">
                            <label for="color-hex">Color: </label>
                            <input type="text" name="color-hex" id="color-hex" oninput="updateFormColor();" required/>
                            <br/>
                            <label for="color-name">Color Name: </label>
                            <input type="text" name="color-name" id="color-name" required/>
                            <br/>
                            <input type="submit" class="btn btn-primary mt-2" id="form-submit" disabled/>
                        </form>
                    </div>
                </div>
        </div>
        <div class="container">
            <?php
                require_once './utils.php';
                $colors = readColorData();

                foreach ($colors as $name => $hex) {
                    $hexColor = htmlentities($hex);

                    if (isHexColor($hexColor)) {
                        buildColorCard(htmlentities($hex), htmlentities($name));
                    }
                }
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    </body>
</html>
