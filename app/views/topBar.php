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

<div class="topnav">
  <a class="active" href="<?= $config["site"]["root"] . "/"?>"> Inicio </a>
  <a href="<?= $config["site"]["root"] . "/equipo"?>">Equipo</a>
  <a href="<?= $config["site"]["root"] . "/jugadores"?>">Jugadores</a>
</div>


</body>
</html>