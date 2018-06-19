<?php 
require('../../modelos/programa-m.php');
require("../../app_data/config.php");
//aca comienza el controlador

$programa = new ProgramaFormacion();//reemplazar $programa y xNombreClase por el nombre de la clase
$modelo = new ProgramaFormacionModel($DB_server,$DB_puerto,$DB_baseDatos,$DB_user,$DB_pass);

if (isset($_REQUEST['action']))
{

  switch ($_REQUEST['action']) {
    case 'registrar':
    $programa->__SET('id_programa',$_REQUEST['id_programa']);
    $programa->__SET('nombre',$_REQUEST['nombre']);
    if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
    $programa->__SET('estado',$estado);
    $programa->__SET('fechaCreacion', date("y/m/d"));
    $modelo->guardar($programa);
      
      header("Location: programa-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista
      
    break;
    case 'actualizar':
    $programa->__SET('id_programa',                      $_REQUEST['id']);
    $programa->__SET('nombre',                   $_REQUEST['nombre']);
    if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
    $programa->__SET('estado',$estado);
    $modelo->actualizar($programa);

  header("Location: programa-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista

  break;
  case 'editar':
    $programa = $modelo->editar($_REQUEST['id']);
  break;
  default:

  break;
}

}
?>