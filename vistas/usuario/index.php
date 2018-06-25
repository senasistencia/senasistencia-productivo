<?php
require("header.php");
require('../../modelos/ficha-m.php');
require("../../app_data/config.php");
$modelo = new FichaModel($DB_server,$DB_puerto,$DB_baseDatos,$DB_user,$DB_pass);
$doc = $llamarsesion[0]->Documento_Cliente;
?>
<div class="container">
  <div class="row">
    <div class="col s12 center-align">
      <?php foreach($llamarsesion as $Datos){
      echo "<p class='titulo'>Te damos la bienvenida a: <br/> <span class='senasistencia'>SENASISTENCIA</span> <br/><span class='username'>".$Datos->PrimerNombre_Cliente ."</span>, <span class='subtitulo '>estas son tus fichas asociadas<span></p>";    
      } ?>
      <div class="divider"></div>

      <?php foreach($modelo->fichasAsoc($doc) as $ficha){?>
        <div class="col s12 m6 l4">          
            <div class="card">
              <div class="card-image">
              <div class="activator tarjetaF verde white-text"><?php echo $ficha->num_ficha?></div>
              <a class="btn-floating halfway-fab waves-effect waves-light activator orange accent-3"><i class="material-icons">add</i></a>
              </div>
              <div class="card-content">
                <span class="card-title grey-text text-darken-4 truncate fuente" title="<?php echo $ficha->FK_programa?>"><?php echo $ficha->FK_programa?></span>    
              </div>
              <div class="card-reveal">
                <span class="card-title grey-text text-darken-4 fuente"><i class="material-icons right">close</i>¿Que vamos hacer?</span>
                <br />
                <a class="waves-effect btn-flat z-depth-0 col s12 h-n" href="listado.php?f=<?php echo $ficha->id_ficha?>">Listado<i class="material-icons right tiny">assignment_ind</i></a>
                <a class="waves-effect btn-flat z-depth-0 col s12 h-a" href="">Editar<i class="material-icons right">create</i></a>
                <a class="waves-effect btn-flat z-depth-0 col s12 h-v" href="">consultar<i class="material-icons right">event_busy</i></a>
              </div>
            </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>



  <?php 
  require('footer.php');
  ?>