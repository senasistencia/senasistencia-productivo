<?php 
require('../../modelos/cliente-m.php');
require("../../app_data/config.php");
//aca comienza el controlaador

$cliente = new Cliente();//reemplazar $programa y xNombreClase por el nombre de la clase
$modelo = new ClienteModel($DB_server,$DB_puerto,$DB_baseDatos,$DB_user,$DB_pass);

if (isset($_REQUEST['ac']))
{

  switch ($_REQUEST['ac']) {
    case 'registrar':
    $cliente->__SET('FK_tipoDocumento',$_REQUEST['FK_tipoDocumento']);
    $cliente->__SET('documentoCliente',$_REQUEST['documentoCliente']);
    $cliente->__SET('primerNombre',$_REQUEST['primerNombre']);
    $cliente->__SET('segundoNombre',$_REQUEST['segundoNombre']);
    $cliente->__SET('primerApellido',$_REQUEST['primerApellido']);
    $cliente->__SET('segundoApellido',$_REQUEST['segundoApellido']);
    $cliente->__SET('correo',$_REQUEST['correo']);
    $cliente->__SET('telefono',$_REQUEST['telefono']);
    $cliente->__SET('FK_perfil',$_REQUEST['FK_perfil']);
    if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
    $cliente->__SET('estado',$estado);
    $cliente->__SET('fechaCreacion', date("y/m/d"));
    $documento = $modelo->guardar($cliente);
    $rol = $_REQUEST['rolusuario'];
    $modelo->asocRol($documento,$rol);
    $contr = $_REQUEST['pass']; 
    $modelo->contrusuario($documento,$contr);
          
    header("Location: cliente-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista
      
    break;
   case 'actualizar':
    $cliente->__SET('FK_tipoDocumento',$_REQUEST['FK_tipoDocumento']);
    $cliente->__SET('documentoCliente',$_REQUEST['documentoCliente']);
    $cliente->__SET('primerNombre',$_REQUEST['primerNombre']);
    $cliente->__SET('segundoNombre',$_REQUEST['segundoNombre']);
    $cliente->__SET('primerApellido',$_REQUEST['primerApellido']);
    $cliente->__SET('segundoApellido',$_REQUEST['segundoApellido']);
    $cliente->__SET('correo',$_REQUEST['correo']);
    $cliente->__SET('telefono',$_REQUEST['telefono']);
    $cliente->__SET('FK_perfil',$_REQUEST['FK_perfil']);
    if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
    $cliente->__SET('estado',$estado);
    $modelo->actualizar($cliente);
    $doc = $_REQUEST['documentoCliente'];
    $rol = $_REQUEST['rolusuario'];
    $modelo->actualizarRol($doc,$rol);
    header("Location: cliente-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista

    break;
    case 'editar':
      $cliente = $modelo->editar($_REQUEST['doc']);
      
    break;
    default:

    break;
  }

}
?>