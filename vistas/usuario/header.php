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
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<!--Import materialize.css-->
		<!-- <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/> estilos locales-->
		<!-- CDN solo funciona con internet-->
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<link rel="stylesheet" href="../../css/estilos.css">
</head>
<body>

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