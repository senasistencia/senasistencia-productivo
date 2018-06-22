<?php 
require('../../modelos/usuario-m.php');
require("../../app_data/config.php");
//aca comienza el controlaador

$cliente = new Usuario();//reemplazar $programa y xNombreClase por el nombre de la clase
$modelo = new UsuarioModel($DB_server,$DB_puerto,$DB_baseDatos,$DB_user,$DB_pass);

if (isset($_REQUEST['action']))
{

  switch ($_REQUEST['action']) {
    case 'registrar':
    $usuario->__SET('id_usuario',$_REQUEST['id_usuario']);
    $usuario->__SET('FK_docCliente',$_REQUEST['FK_docCliente']);
    $usuario->__SET('password_hash',$_REQUEST['password_hash']);
    if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
    $usuario->__SET('estado',$estado);
    $usuario->__SET('fechaCreacion', date("y/m/d"));
    $modelo->guardar($usuario);
      
      header("Location: usuario-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista
      
    break;
   case 'actualizar':
   $usuario->__SET('id_usuario',$_REQUEST['id']);
    $usuario->__SET('FK_docCliente',$_REQUEST['FK_docCliente']);
    $usuario->__SET('password_hash',$_REQUEST['password_hash']);
    if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
    $usuario->__SET('estado',$estado);
    if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
    $usuario->__SET('estado',$estado);
    $modelo->actualizar($usuario);

    header("Location: usuario-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista

    break;
    case 'editar':
      $usuario = $modelo->editar($_REQUEST['id']);
    break;
    default:

    break;
  }

}
?>