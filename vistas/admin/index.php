<?php
require("header.php");
?>


  <h6>Bienvenid@: <?php foreach($llamarsesion as $Datos){
    echo $Datos->PrimerNombre_Cliente . "<br>" . $Datos->Tipo_Rol;    
  } ?> </h6>
  <a href="../../Cerrarsesion.php">Cerrar Sesion</a>


