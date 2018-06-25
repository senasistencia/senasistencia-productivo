<?php 
require('../../modelos/cambiarContrasena-m.php');
require("../../app_data/config.php");
//aca comienza el controlaador

$cliente = new Usuario();//reemplazar $programa y xNombreClase por el nombre de la clase
$modelo = new UsuarioModel($DB_server,$DB_puerto,$DB_baseDatos,$DB_user,$DB_pass);

if (isset($_REQUEST['ac']))
{

  switch ($_REQUEST['ac']) {
    case 'actualizar':
   $usuario->__SET('id_usuario',$_REQUEST['id']);
   $usuario->__SET('FK_docCliente',$_REQUEST['FK_docCliente']);
   $usuario->__SET('password_hash',$_REQUEST['password_hash']);
   if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
    $usuario->__SET('estado',$estado);
    $modelo->actualizar($usuario);

header("Location: cambiarContrasena-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista

    break;
    case 'editar':
      $usuario = $modelo->editar($_REQUEST['id']);
    break;
    default:

    break;
  }

}
?>