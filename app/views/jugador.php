<html>

<head>
    <?php
    include "topBar.php";
    ?>
    <link rel="stylesheet" type="text/css" href="../public/css/topBar.css">
</head>

<body>

    <?php

    echo ("Página de " . $data[0]["Nombre"] .
            "<br> Peso: ". $data[0]["Peso"]);


    ?>


</body>

</html>