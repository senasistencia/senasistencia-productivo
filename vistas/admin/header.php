<?php 
session_start();
//error_reporting(0);
$llamarsesion = $_SESSION['id_user'];
if ($llamarsesion[0]->Tipo_Rol != 'Administrador')
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
		 <link type="text/css" rel="stylesheet" href="../../css/materialize.min.css"  media="screen,projection"/>
		<!-- CDN solo funciona con internet-->
  <!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta charset="utf-8"/>
		<link rel="stylesheet" href="../../css/estilos.css">
</head>
<body>
<ul id="gestiones" class="dropdown-content">
  <li><a href="aprendiz-v.php" class=""><i class="material-icons left">school</i>Aprendices</a></li>
  <li><a href="cliente-v.php"><i class="material-icons left">group</i>Usuarios</a></li>
  <li><a href="ficha-v.php"><i class="material-icons left">view_module</i>Fichas</a></li>
  <li><a href="perfil-v.php"><i class="material-icons left">recent_actors</i>Perfiles</a></li>
  <li><a href="programa-v.php"><i class="material-icons left">layers</i>Programas</a></li>
  <li><a href="rol-v.php"><i class="material-icons left">verified_user</i>Roles</a></li>

</ul>
<ul id="miCuentaOp" class="dropdown-content">
  <li><a href="#!" class=""><i class="material-icons left">settings</i>Configuración</a></li>
  <li><a href="../../Cerrarsesion.php"><i class="material-icons left">transit_enterexit</i>Cerrar sesión</a></li> 
</ul>
<nav>
    <div class="nav-wrapper cyan darken-4">
      <img src="../../imagenes/admin.png" class="logo-admin brand-logo">
      <a href="#" data-activates="menu-lateral" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        <li><a class="dropdown-button" data-activates='gestiones'>Gestion<i class="material-icons left">account_balance</i></a></li>
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