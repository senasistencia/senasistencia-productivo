<?php 
require('header.php');
//require('../../modelos/ficha');
require('../../app_data/config.php');
require('../../app_data/conexion.php');
$nficha = $_GET['f'];
$consulta = "CALL sp_listadoA(?)";//el nombre de la tabla
$objeto = $PDO->prepare($consulta);
$objeto->execute(array($nficha));
$tabla = $objeto->fetchAll(PDO::FETCH_OBJ);
?>
<div class="container">
  <div class="row">
    <h3 class="center-align">Listado de aprendices</h3><div class="divider"></div>
    <?php foreach ($tabla as $datos) {
        print_r($datos);
    } ?>
  </div>
</div>



















<?php 
require('footer.php');
?>