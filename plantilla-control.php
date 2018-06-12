<?php
require("../clases/xclase.php");
require("../modelos/xtabla-modelo.php");
$xclase = new xNombreClase();//reemplazar $xclase y xNombreClase por el nombre de la clase
$modelo = new xNombreModelo();//reemplazar xNombre por el nombre del modelo

if (isset($_REQUEST['ac']))
{
  switch ($_REQUEST['ac']) {
    case 'registrar':
      $xclase->__SET('xid:clase',$_REQUEST['id']);
      $xclase->__SET('xatributo:clase',$_REQUEST['XXCAMPO']);//XXCAMPO corresponde al nombre que tiene el <input> en la vista
      $xclase->__SET('xatributoforaneo',$_REQUEST['xxcampoforaneo']);//xxcampoforaneo corresponde al nombre que tiene el <select> de la vista
      $modelo->crear($xclase);//reemplazar $xclase por lavariable con la clase
      header("Location: xnombreArchivo-vista.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista

    break;
    case 'actualizar':
    $xclase->__SET('xid:clase',$_REQUEST['id']);
    $xclase->__SET('xatributo:clase',$_REQUEST['XXCAMPO']);//XXCAMPO corresponde al nombre que tiene el <input> en la vista
    $xclase->__SET('xatributoforaneo',$_REQUEST['xxcampoforaneo']);//xxcampoforaneo corresponde al nombre que tiene el <select> de la vista
    $modelo->actualizar($xclase);//reemplazar $xclase por lavariable con la clase
    header("Location: xnombreArchivo-vista.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista

    break;
    case 'editar':
      $xclase = $modelo->editar($_REQUEST['id']);//la variable que contiene la clase sera igual a lo que devuelve la funcion del modelo llamada editar
    break;
    case 'eliminar':
      $modelo->eliminar($_REQUEST['id'])
      header("Location: xnombreArchivo-vista.php");
    break;
    default:

    break;
  }
}





?>
