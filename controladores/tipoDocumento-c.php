<?php 
require('../../modelos/tipoDocumento-m.php');
require("../../app_data/config.php");
//aca comienza el controlador

$documento = new TipoDocumento();//reemplazar $programa y xNombreClase por el nombre de la clase
$modelo = new TipoDocumentoModel($DB_server,$DB_puerto,$DB_baseDatos,$DB_user,$DB_pass);

if (isset($_REQUEST['ac']))
{

  switch ($_REQUEST['ac']) {
    case 'registrar':

    $documento->__SET('id_tipoDocumento',$_REQUEST['id']);
    $documento->__SET('nombreTipoDocumento',$_REQUEST['nombreTipoDocumento']);
    if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
    $documento->__SET('estado',$estado);
    $documento->__SET('fechaCreacion', date("y/m/d"));
      $modelo->guardar($documento);
      
      header("Location: tipoDocumento-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista
      
    break;
   case 'actualizar':
   $documento->__SET('id_tipoDocumento',$_REQUEST['id']);
   $documento->__SET('nombreTipoDocumento',$_REQUEST['nombreTipoDocumento']);
   if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
   $documento->__SET('estado',$estado);
      $modelo->actualizar($documento);

    header("Location: tipoDocumento-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista

    break;
    case 'editar':
      $documento = $modelo->editar($_REQUEST['id']);
    break;
    default:

    break;
  }

}
?>