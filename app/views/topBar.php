<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="public/css/topBar.css">

</head>

<body>

  <?php
  global $config;
  ?>

  <div class="topnav" id="top">
    <a class="btn" href="<?= $config["site"]["root"] . "/" ?>"> Inicio </a>
    <a class="btn" href="<?= $config["site"]["root"] . "/equipo" ?>">Equipo</a>
    <a class="btn" href="<?= $config["site"]["root"] . "/jugadores" ?>">Jugadores</a>

    <?php

    use core\auth\Auth;
    use core\JWT\JWT;



    if (!auth::check()) {
      ?>

      <a href="<?= $config['site']['root'] . "/login" ?>" class="topnav--right">Inicia Sesión</a>
      <a class="active" href="<?= $config['site']['root'] . "/registro" ?>">Registrate</a>

    <?php
    } else {
      $key = $GLOBALS["config"]["JWT"]["key"];
      $decoded = JWT::decode($_COOKIE["DWS_framework"], $key, array('HS256'));
      $decoded_array = (array) $decoded;
      ?>

      <a href="<?= $config['site']['root'] . "/logout" ?>" class="topnav--right">Cierra Sesión</a>
      <a class="active" href=""><?= $decoded_array["userName"] ?></a>
      <img class="active topnav__imagen" src="<?= $GLOBALS['config']['site']['root'] ?>/public/images/avatars/<?= $decoded_array['avatar'] ?>" alt="foto perfil">

    <?php
    }
    ?>

  </div>
</body>

</html>