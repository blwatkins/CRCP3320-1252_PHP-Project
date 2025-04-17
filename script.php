<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sketch</title>
    </head>
    <body>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/p5@1.11.4/lib/p5.min.js"></script>
        <script type="text/javascript">
            <?php echo 'var count = 10;';
                // colors are going to be defined as strings
                // those strings are going to be placed in an JSON object
                // echo the JSON to the script
                $colors = array();
                $colors[] = 'color(255, 0, 0)';
                $colors[] = 'color(0, 255, 0)';
                $colors[] = 'color(0, 0, 255)';
                $colors[] = 'color(255, 255, 0)';
            ?>
        </script>
        <script type="text/javascript" src="./src/sketch.js"></script>
    </body>
</html>
