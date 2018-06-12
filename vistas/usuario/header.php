<?php 
session_start();
//error_reporting(0);
$llamarsesion = $_SESSION['id_user'];
if ($llamarsesion[0]->Tipo_Rol !== 'Usuario')
{
  header('Location: ../../404notFound.php');
  die();
}
?>

<!DOCTYPE html>
<html>
<head>
		<!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
		<!--Import materialize.css-->
		<!-- <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/> estilos locales-->
		<!-- CDN solo funciona con internet-->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8"/>
		<link rel="stylesheet" href="../../css/estilos.css">
</head>
<body>
<ul id="miCuentaOp" class="dropdown-content">
  <li><a href="#!" class="">Configuración<i class="material-icons left">settings</i></a></li>
  <li><a href="../../Cerrarsesion.php">Cerrar sesión<i class="material-icons left">transit_enterexit</i></a></li> 
</ul>
<nav>
    <div class="nav-wrapper cyan darken-4">
      <img src="../../imagenes/admin.png" class="logo-admin brand-logo">
      <a href="#" data-activates="menu-lateral" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
      <li><a href="badges.html">Excusas<i class="material-icons left">date_range</i></a></li>
        <li><a href="collapsible.html">Reportes<i class="material-icons left">assessment</i></a></li>
        <li><a class='dropdown-button' href='' data-activates='miCuentaOp'>Mi Cuenta<i class="material-icons left">account_circle</i></a></li>
      </ul>
      <ul class="side-nav" id="menu-lateral">
        <li><a class="dropdown-button" href="#!" data-activates="miCuentaOp2">Mi Cuenta<i class="material-icons left">account_circle</i></a></li>
        <li><a href="badges.html">Excusas<i class="material-icons left">date_range</i></a></li>
        <li><a href="collapsible.html">Reportes<i class="material-icons left">assessment</i></a></li>
      </ul>
  </nav>
  <main>