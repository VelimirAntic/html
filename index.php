<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./font/Skranji-Bold.ttf">
    <link rel="stylesheet" href="./font/Skranji-Regular.ttf"> -->
    <!-- <link rel="stylesheet" href="./scss/style.scss"> -->
    <script src="./js/jquery.min.js"></script>
    <title>Page</title>
    <style>
        @font-face {
            font-family: "Skranji-Regular";
            src: url("./font/Skranji-Regular.ttf");
        }

        @font-face {
            font-family: "Skranji-Bold";
            src: url("./font/Skranji-Bold.ttf");
        }
    </style>
    <?php
    require_once "scssphp-1.10.3/scss.inc.php";

    use ScssPhp\ScssPhp\Compiler;
    $compiler = new Compiler();
    $compiler->setImportPaths('scss/');

    // will search for 'assets/stylesheets/mixins.scss'
    echo "<style>" . $compiler->compileString('@import "style.scss";')->getCss(). "</style>";
    ?>
</head>


<body>
    <div id="carta">
        <div>
            <div>
                <h2 id="nombre"></h2>
                <div style="display: flex;justify-content:center">
                    <img id="escudo">
                </div>
            </div>
        </div>
        <div>
            <img id="foto">
        </div>
        <div id="contenedor">
            <div id="datos">
                <div>
                    <div class="itemI">Edad</div>
                    <div id="edad" class="itemD"></div>
                </div>
                <div>
                    <div class="itemI">Altura</div>
                    <div id="altura" class="itemD"></div>
                </div>
                <div>
                    <div class="itemI">Peso</div>
                    <div id="peso" class="itemD"></div>
                </div>
                <div>
                    <div class="itemI">Goles</div>
                    <div id="goles" class="itemD"></div>
                </div>
                <div>
                    <div class="itemI">Asistencia</div>
                    <div id="assitencias" class="itemD"></div>
                </div>
                <div>
                    <div class="itemI letrasNaranjas">Puntuacion</div>
                    <div id="puntuacion" class="itemD fondoRojo"></div>
                </div>
            </div>
        </div>
        <div id="description"></div>
    </div>
</body>
<script src="./js/js_data.js"></script>
<script>
    $.get('./json/data.json', function(res) {
        console.log(res, res.player.age);
        $("#nombre").text(res.player.name);
        $("#edad").text(res.player.age);
        $("#altura").text(res.player.height);
        $("#peso").text(res.player.weight);
        $("#goles").text(res.player.goals);
        $("#assitencias").text(res.player.assistance);
        $("#puntuacion").text(res.player.punctuation);
        $("#description").text(res.player.description);
        $("#foto").attr({
            src: res.player.photo
        });
        $("#escudo").attr({
            src: res.player.shield
        });
    })
</script>

</html>