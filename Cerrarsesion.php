<?php
session_start();
//error_reporting(0);
$llamarsesion = $_SESSION['id_user'];
if ($llamarsesion == null || $llamarsesion == '')
{
  echo 'No tiene permiso para ingresar';
  die();
}
session_destroy();

header('Location: login.php');
?>