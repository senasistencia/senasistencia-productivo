<?php
require("header.php");
session_start();
if (isset($_SESSION['id_user']))
{
  if($_SESSION['id_user']['Tipo_Rol'] != 'ADMINISTRADOR')
  {
    header('Location: ../usuario/index.php');
  }
  else
  {
	header('Location: admin/index.php');    
  }
}
?>
<nav>
    <div class="nav-wrapper cyan darken-4">
      <img src="../../imagenes/admin.png" class="logo-admin brand-logo">
      <a href="#" data-activates="menu-lateral" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a href="sass.html"  class="hover-blanco"></a></li>
        <li><a href="badges.html"></a></li>
        <li><a href="collapsible.html"></a></li>
        <li><a href="mobile.html"></a></li>
      </ul>
      <ul class="side-nav" id="menu-lateral">
        <li><a href="sass.html"></a></li>
        <li><a href="badges.html"></a></li>
        <li><a href="collapsible.html"></a></li>
        <li><a href="mobile.html"></a></li>
      </ul>
  </nav>
    <!--CDN solo funciona con internet -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src="../../js/app.js"></script>
		<!--libreria local
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script> -->
<<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bienvenida</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>
</head>
<body>
  <h1>Bienvenid@ <?php echo $_SESSION['id_user']['Tipo_Rol'] ?> </h1>
  <a href="Cerrarsesion.php">Cerrar Sesion</a>
</body>
</html>
