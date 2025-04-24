<!DOCTYPE html>
<?php
function buildColorCard($backgroundColor, $colorName) {
echo '<div class="card m-2" style="width: 15rem;">';
echo '<div class="card-body">';
echo '<div style="background:' . $backgroundColor . '; height: 15rem"></div>';
echo '<p>' . $colorName . '</p>';
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

                if (match) {
                    colorBlock.style.background = inputValue;
                } else {
                    colorBlock.style.background = 'black';
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
                        <form id="new-color-form">
                            <label for="color-hex">Color: </label>
                            <input type="text" name="color-hex" id="color-hex" oninput="updateFormColor();"/>
                        </form>
                    </div>
                </div>
        </div>
        <div class="container">
            <?php
                $jsonString = file_get_contents('./data/colors.json');
                $colors = array();

                if ($jsonString) {
                    $colors = json_decode($jsonString, true);
                }

                foreach ($colors as $name => $hex) {
                    $hexColor = htmlentities($hex);
                    $match = preg_match("/^#[0-9A-Z]{6}$/", $hexColor);

                    if ($match === 1) {
                        buildColorCard(htmlentities($hex), htmlentities($name));
                    }
                }
            ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    </body>
</html>
