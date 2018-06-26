<?php 
require('header.php');
//require('../../modelos/ficha');
require('../../app_data/config.php');
require('../../modelos/aprendiz-m.php');
$modelo = new AprendizModel($DB_server,$DB_puerto,$DB_baseDatos,$DB_user,$DB_pass);
$nficha = $_GET['f'];

?>
<div class="container">
  <div class="row">
    <h3 class="center-align">Listado de aprendices</h3><div class="divider"></div>
    <div class="container">
      <div class="row"> 
    
    <table class="striped bordered responsive-table  right-align">
      <thead>
        <tr>
          <th>Documento</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Asiste</th>
        </tr>
      </thead>
    <tbody>
    <?php 
    $i=1;
    foreach( $modelo->listado($nficha) as $fila){?>
    <tr>
      <td><?php echo $fila->Documento_Aprendiz;?></td>
      <td><?php echo $fila->PrimerNombre_Aprendiz;?></td>
      <td><?php echo $fila->PrimerApellido_Aprendiz;?></td>
      <td>
      <p>
      <input type="checkbox" id="<?php echo $i?>" />
      <label for="<?php echo $i ?>"></label>
      </p>
      </td>
    </tr>
    <?php $i++; } ;?>
    </tbody>
    </table>
    <input type="submit" class="btn col s12">
    </div>
    </div>
  </div>
</div>



















<?php 
require('footer.php');
?>