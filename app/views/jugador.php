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
    <textarea readonly class="textarea">
    </textarea>
    <form name="login" action="<?= $config['site']['root']?>/compruebaLogin" method="post">
    <!-- 
            <input type="text" class="inputAuth" name="user" placeholder="Nombre de usuario" required/>
            <input type="password" class="inputAuth" name="password" placeholder="Password" required/>
             -->

            <input type="text" name="comentario" placeholder="Escribe tu comentario" required>
            <button id="authButton" type="submit" name="submit">OK</button>
    </form>
    
    </div>



</body>

</html>