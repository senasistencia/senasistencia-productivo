<?php
require('config.php');
    try
    {
      $PDO = new PDO("mysql:host=$DB_server;port=$DB_puerto;dbname=$DB_baseDatos;charset=utf8",$DB_user,$DB_pass);
      $PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      //echo "se conecto";//probar conexion
      
    } catch (PDOException $error)
    {
      echo "no se conecto a la base de datos codigo de error: ";
      die($error->getMessage());
    }

?>