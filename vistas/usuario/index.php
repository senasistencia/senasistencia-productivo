<?php
require("header.php");
$doc = $llamarsesion[0]->Documento_Cliente;
?>
<div class="container">
  <div class="row">
    <div class="col s12 center-align">
    <?php foreach($llamarsesion as $Datos){
    echo "<p class='titulo'>Te damos la bienvenida a: <br/> <span class='senasistencia'>SENASISTENCIA</span> <br/><span class='username'>".$Datos->PrimerNombre_Cliente ."</span>, <span class='subtitulo '>estas son tus fichas asociadas<span></p>";    
  } ?>
    <div class="divider"></div>
    <div class="col s12 m4">
      <?php //foreach()?>
    </div>
  </div>
  </div>
</div>

  
  


















  <?php 
  require('footer.php');
  ?>