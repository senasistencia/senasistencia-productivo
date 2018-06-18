<?php 
require('../../modelos/perfil-m.php');
require("../../app_data/config.php");
//aca comienza el controlador

$ficha = new Perfil();//reemplazar $programa y xNombreClase por el nombre de la clase
$modelo = new PerfilModel($DB_server,$DB_puerto,$DB_baseDatos,$DB_user,$DB_pass);

if (isset($_REQUEST['ac']))
{

  switch ($_REQUEST['ac']) {
    case 'registrar':

      $perfil->__SET('id_perfil',              $_REQUEST['id_perfil']);
      $perfil->__SET('tipo_perfil',            $_REQUEST['tipo_perfil']);
      if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
      $perfil->__SET('estado',$estado);
      $perfil->__SET('fechaCreacion', date("y/m/d"));
      $modelo->guardar($perfil);
      header("Location: perfil-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista
      
    break;
   case 'actualizar':
   $perfil->__SET('id_perfil',                 $_REQUEST['id_perfil']);
   $perfil->__SET('tipo_perfil',               $_REQUEST['tipo_perfil']);
   if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
   $perfil->__SET('estado',$estado);
   $modelo->actualizar($perfil);
    header("Location: perfil-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista

    break;
    
    case 'editar':
      $perfil = $modelo->editar($_REQUEST['id']);
    break;
    default:

    break;
?>