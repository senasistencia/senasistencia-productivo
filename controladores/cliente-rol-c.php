<?php 
require('../../modelos/cliente-rol-m.php');
require("../../app_data/config.php");
//aca comienza el controlador

$clRol = new Cliente_Rol();//reemplazar $programa y xNombreClase por el nombre de la clase
$modelo = new Cliente_RolModel($DB_server,$DB_puerto,$DB_baseDatos,$DB_user,$DB_pass);

if (isset($_REQUEST['ac']))
{

  switch ($_REQUEST['ac']) {
    case 'registrar':

      $clRol->__SET('FK_docCliente',                     $_REQUEST['FK_docCliente']);
      $clRol->__SET('FK_Rol',                            $_REQUEST['FK_Rol']);
      $modelo->guardar($clRol);
      
      header("Location: cliente-rol-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista
      
    break;
   case 'actualizar':
      $clRol->__SET('FK_docCliente',                     $_REQUEST['FK_docCliente']);
      $clRol->__SET('FK_Rol',                            $_REQUEST['FK_Rol']);
      $modelo->actualizar($clRol);

    header("Location: cliente-rol-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista

    break;
    case 'editar':
      $clRol = $modelo->editar($_REQUEST['id']);
    break;
    default:

    break;
  }

}
?>