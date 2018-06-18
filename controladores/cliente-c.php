<?php
require('../../modelos/cliente-m.php');
require("../../app_data/config.php");

//aca comienza el controlador

$cliente = new Cliente();//reemplazar $programa y xNombreClase por el nombre de la clase
$modelo = new ClienteModel($DB_server,$DB_puerto,$DB_baseDatos,$DB_user,$DB_pass);


if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
       case 'actualizar':
            $cliente->__SET('FK_tipoDocumento',                  $_REQUEST['FK_tipoDocumento']);
            $cliente->__SET('documentoCliente',                  $_REQUEST['documentoCliente']);
            $cliente->__SET('primerNombre',                      $_REQUEST['primerNombre']);
            $cliente->__SET('segundoNombre',                     $_REQUEST['segundoNombre']);
            $cliente->__SET('primerApellido',                    $_REQUEST['primerApellido']);
            $cliente->__SET('segundoApellido',                   $_REQUEST['segundoApellido']);
            $cliente->__SET('correo',                            $_REQUEST['correo']);
            $cliente->__SET('telefono',                          $_REQUEST['telefono']);
            $cliente->__SET('Ficha',                             $_REQUEST['Ficha']);
            if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
            $cliente->__SET('estado',$estado);
            $cliente->__SET('fechaCreacion', date("y/m/d"));
            $model->Actualizar($cliente);
            header('Location: cliente-v.php');
            break;

        case 'registrar':
            $cliente->__SET('FK_tipoDocumento',                  $_REQUEST['FK_tipoDocumento']);
            $cliente->__SET('documentoCliente',                  $_REQUEST['documentoCliente']);
            $cliente->__SET('primerNombre',                      $_REQUEST['primerNombre']);
            $cliente->__SET('segundoNombre',                     $_REQUEST['segundoNombre']);
            $cliente->__SET('primerApellido',                    $_REQUEST['primerApellido']);
            $cliente->__SET('segundoApellido',                   $_REQUEST['segundoApellido']);
            $cliente->__SET('correo',                            $_REQUEST['correo']);
            $cliente->__SET('telefono',                          $_REQUEST['telefono']);
            $cliente->__SET('Ficha',                             $_REQUEST['Ficha']);
            if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
            $cliente->__SET('estado',$estado);
            $model->Registrar($cliente);
            header('Location: cliente-v.php');
            break;

            break;
            case 'editar':
              $cliente = $modelo->editar($_REQUEST['id']);
            break;
            default:
        
            break;
    }
}
?>