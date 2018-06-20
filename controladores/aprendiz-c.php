<?php 
require('../../modelos/aprendiz-m.php');
require("../../app_data/config.php");
//aca comienza el controlaador

$aprendiz = new Aprendiz();//reemplazar $programa y xNombreClase por el nombre de la clase
$modelo = new AprendizModel($DB_server,$DB_puerto,$DB_baseDatos,$DB_user,$DB_pass);

if (isset($_REQUEST['ac']))
{

  switch ($_REQUEST['ac']) {
    case 'registrar':
    $aprendiz->__SET('FK_tipoDocumento',$_REQUEST['FK_tipoDocumento']);
    $aprendiz->__SET('documentoAprendiz',$_REQUEST['documentoAprendiz']);
    $aprendiz->__SET('primerNombre',$_REQUEST['primerNombre']);
    $aprendiz->__SET('segundoNombre',$_REQUEST['segundoNombre']);
    $aprendiz->__SET('primerApellido',$_REQUEST['primerApellido']);
    $aprendiz->__SET('segundoApellido',$_REQUEST['segundoApellido']);
    $aprendiz->__SET('correo',$_REQUEST['correo']);
    $aprendiz->__SET('telefono',$_REQUEST['telefono']);
    $aprendiz->__SET('FK_ficha',$_REQUEST['FK_ficha']);
    if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
    $aprendiz->__SET('estado',$estado);
    $aprendiz->__SET('fechaCreacion', date("y/m/d"));
    $modelo->guardar($aprendiz);
      
      header("Location: aprendiz-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista
      
    break;
   case 'actualizar':
    $aprendiz->__SET('FK_tipoDocumento',$_REQUEST['FK_tipoDocumento']);
    $aprendiz->__SET('documentoAprendiz',$_REQUEST['documentoAprendiz']);
    $aprendiz->__SET('primerNombre',$_REQUEST['primerNombre']);
    $aprendiz->__SET('segundoNombre',$_REQUEST['segundoNombre']);
    $aprendiz->__SET('primerApellido',$_REQUEST['primerApellido']);
    $aprendiz->__SET('segundoApellido',$_REQUEST['segundoApellido']);
    $aprendiz->__SET('correo',$_REQUEST['correo']);
    $aprendiz->__SET('telefono',$_REQUEST['telefono']);
    $aprendiz->__SET('FK_ficha',$_REQUEST['FK_ficha']);
    if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
    $aprendiz->__SET('estado',$estado);
      $modelo->actualizar($aprendiz);

    header("Location: aprendiz-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista

    break;
    case 'editar':
      $aprendiz = $modelo->editar($_REQUEST['doc']);
    break;
    default:

    break;
  }

}
?>