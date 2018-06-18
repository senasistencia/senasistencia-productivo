<?php 
require('../../modelos/rol-m.php');
require("../../app_data/config.php");
//aca comienza el controlador

$rol = new Rol();//reemplazar $programa y xNombreClase por el nombre de la clase
$modelo = new RolModel($DB_server,$DB_puerto,$DB_baseDatos,$DB_user,$DB_pass);

if (isset($_REQUEST['action']))
{

  switch ($_REQUEST['action']) {
    case 'registrar':
    $rol->__SET('tipo_rol',               $_REQUEST['tipo_rol']);
    if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
    $rol->__SET('estado',$estado);
    $rol->__SET('fechaCreacion', date("y/m/d"));
    $modelo->guardar($rol);
      
      header("Location: rol-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista
      
    break;
   case 'actualizar':
   $rol->__SET('id_rol',                 $_REQUEST['id_rol']);
   $rol->__SET('tipo_rol',               $_REQUEST['tipo_rol']);
   if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
   $rol->__SET('estado',$estado);
      $modelo->actualizar($rol);

    header("Location: rol-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista

    break;
    case 'editar':
      $rol = $modelo->editar($_REQUEST['id']);
    break;
    default:

    break;
  }

}
?>