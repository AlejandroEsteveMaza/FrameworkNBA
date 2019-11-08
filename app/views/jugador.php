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
        "<br> Peso: " . $data[0]["Peso"]);


    ?>
    <div class="chat">


        <table>
            <tr>
                <th>Usuario</th>
                <th>Comentario</th>
            </tr>
            <?php
            foreach ($data[1] as $value) {
                //echo ("-" . $value["comentario"]);
                echo "<tr>
                    <td>" . $value['usuario'] . "</td>
                    <td>" . $value['comentario'] . "</td>
                </tr>";
            }
            ?>
        </table>

        <form name="login" action="<?= $config['site']['root'] ?>/comentar" method="post">
            

            
                <input type="text" name="comentario" placeholder="Escribe tu comentario" required> 
                <input type="hidden" name="idJugador" value="<?= $data[0]['codigo'] ?>">
                <button id="authButton" type="submit" name="submit">OK</button>
           
            
        </form>

    </div>



</body>

</html>