<?php 
require('../../modelos/ficha-m.php');
require("../../app_data/config.php");
//aca comienza el controlador

$ficha = new Ficha();//reemplazar $programa y xNombreClase por el nombre de la clase
$modelo = new FichaModel($DB_server,$DB_puerto,$DB_baseDatos,$DB_user,$DB_pass);

if (isset($_REQUEST['ac']))
{

  switch ($_REQUEST['ac']) {
    case 'registrar':

      $ficha->__SET('id_ficha',$_REQUEST['id']);
      $ficha->__SET('FK_programa',$_REQUEST['FK_programa']);
      $ficha->__SET('num_ficha',$_REQUEST['num_ficha']);
      $ficha->__SET('grupo',$_REQUEST['grupo']);
      $ficha->__SET('jornada',$_REQUEST['jornada']);
      $ficha->__SET('trimestre',$_REQUEST['trimestre']);
      if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
      $ficha->__SET('estado',$estado);
      $ficha->__SET('fechaCreacion', date("y/m/d"));
      $ultimo = $modelo->guardar($ficha);
      $cc = $_REQUEST['instasoc'];
      $modelo->asocInstructor($cc,$ultimo);
      header("Location: ficha-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista*/
      
    break;
   case 'actualizar':
      $ficha->__SET('id_ficha',                      $_REQUEST['id']);
      $ficha->__SET('FK_programa',                   $_REQUEST['FK_programa']);
      $ficha->__SET('num_ficha',                     $_REQUEST['num_ficha']);
      $ficha->__SET('grupo',                         $_REQUEST['grupo']);
      $ficha->__SET('jornada',                       $_REQUEST['jornada']);
      $ficha->__SET('trimestre',                     $_REQUEST['trimestre']);
      if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
      $ficha->__SET('estado',$estado);
      $modelo->actualizar($ficha);

    header("Location: ficha-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista

    break;
    case 'editar':
      $ficha = $modelo->editar($_REQUEST['id']);
    break;
    default:

    break;
  }

}
?>