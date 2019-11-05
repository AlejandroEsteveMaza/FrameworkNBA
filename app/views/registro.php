<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Portada</title>
    <link rel="stylesheet" type="text/css" media="screen" href="public/css/login-register.css" />
</head>
<body>
<?php
    include "topBar.php"; 
?>
<div id="content">
    <div id="loginForm">
        <form enctype ="multipart/form-data" name="register" action="<?= $config['site']['root']?>/registroUsuario" method="post">
            <input type="text" class="inputAuth" name="user" placeholder="Nombre de usuario" required/>
            <input type="password" class="inputAuth" name="password" placeholder="Password" required/>
            <input type="password" class="inputAuth" name="password2" placeholder="Repite password" required/>
            <input type="file" name="avatar"/>
            <button id="authButton" type="submit" name="submit">OK</button>
        </form>
    </div>
</div>    
</body>
</html>