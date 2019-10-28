<html>

<head>
    <?php
    include "topBar.php";
    ?>
    <link rel="stylesheet" type="text/css" href="public/css/jugadores.css">
</head>

<body>
    <div class="gallery_container">
        <div id="botones">
            <a  href="<?= $config["site"]["root"] . "/jugadores/nuevo"?>">Añadir</a>
            <a  href="<?= $config["site"]["root"] . "/jugadores/actualizar"?>">Actualizar</a>
            <a  href="<?= $config["site"]["root"] . "/jugadores/borrar"?>">Borrar</a>
        </div>
        <?php
      
        foreach ($data as $key => $value) {
            echo "<div class='gallery'>";
            echo "<a href='". $config["site"]["root"] . "/jugador/".$value["codigo"]."" ."'>";
            echo "<img src='public/images/celticslogo.png'>";
            echo "<div class='desc'>". $value["Nombre"] ."</div>";
            echo "</a>";
            echo "</div>";
        }
        ?>
    </div>
</body>

</html>