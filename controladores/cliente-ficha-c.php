<?php 
require('../../modelos/cliente-ficha-m.php');
require("../../app_data/config.php");
//aca comienza el controlador

$clficha = new Cliente_Ficha();//reemplazar $programa y xNombreClase por el nombre de la clase
$modelo = new Cliente_FichaModel($DB_server,$DB_puerto,$DB_baseDatos,$DB_user,$DB_pass);

if (isset($_REQUEST['action']))
{

  switch ($_REQUEST['action']) {
    case 'registrar':

      $clficha->__SET('FK_docCliente',                     $_REQUEST['FK_docCliente']);
      $clficha->__SET('FK_Ficha',                          $_REQUEST['FK_Ficha']);
      $modelo->guardar($clficha);
      
      header("Location: ../vistas/cliente-ficha-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista
      
    break;
   case 'actualizar':
      $clficha->__SET('FK_docCliente',                     $_REQUEST['FK_docCliente']);
      $clficha->__SET('FK_Ficha',                          $_REQUEST['FK_Ficha']);
      $modelo->actualizar($clficha);

    header("Location: ../vistas/cliente-ficha-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista

    break;
    case 'editar':
      $clficha = $modelo->editar($_REQUEST['id']);
    break;
    default:

    break;
  }

}
?>