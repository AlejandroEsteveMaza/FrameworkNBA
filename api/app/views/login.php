<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" media="screen" href="public/css/login-register.css" />
    <script src="../web/main.js"></script>
</head>
<body>
<div id="content">
    <div id="loginForm">
      
            <input type="text" class="inputAuth" name="user" placeholder="Nombre de usuario" id="nomUsuario" required/>
            <input type="password" class="inputAuth" name="password" placeholder="Password"  id="password" required/>
            <button id="authButton" onclick="login()">OK</button>
        
    </div>
</div>    
</body>
</html>