<?php
require_once '../clases/aprendiz.php';
require_once '../modelos/aprendiz-modelo.php';

// Logica
$prendiz = new Aprendiz();
$model = new CRUDaprendiz();

if(isset($_REQUEST['action']))
{
    switch($_REQUEST['action'])
    {
       case 'actualizar':
            $aprendiz->__SET('Tipo de Documento',                  $_REQUEST['Tipo de Documento']);
            $aprendiz->__SET('Documento',                          $_REQUEST['Documento']);
            $aprendiz->__SET('Primer Nombre del Aprendiz',         $_REQUEST['Primer Nombre del Aprendiz']);
            $aprendiz->__SET('Segundo Nombre del Aprendiz',        $_REQUEST['Segundo Nombre del Aprendiz']);
            $aprendiz->__SET('Primer Apellido del Aprendiz',       $_REQUEST['Primer Apellido del Aprendiz']);
            $aprendiz->__SET('Segundo Apellido del Aprendiz',      $_REQUEST['Segundo Apellido del Aprendiz']);
            $aprendiz->__SET('Correo del Aprendiz',                $_REQUEST['Correo del Aprendiz']);
            $aprendiz->__SET('Telefono del Aprendiz',              $_REQUEST['Telefono del Aprendiz']);
            $aprendiz->__SET('Ficha',                              $_REQUEST['Ficha']);
            $aprendiz->__SET('Estado del Aprendiz',                $_REQUEST['Estado del Aprendiz']);
            $aprendiz->__SET('Fecha de Creación del Aprendiz',     $_REQUEST['Fecha de Creación del Aprendiz']);
            $aprendiz->__SET('Fecha de Inacticación del Aprendiz', $_REQUEST['Fecha de Inacticación del Aprendiz']);

            $model->Actualizar($aprendiz);
            header('Location: ../vistas/aprendiz.php');
            break;

        case 'registrar':
            $aprendiz->__SET('Tipo de Documento',                  $_REQUEST['Tipo de Documento']);
            $aprendiz->__SET('Documento',                          $_REQUEST['Documento']);
            $aprendiz->__SET('Primer Nombre del Aprendiz',         $_REQUEST['Primer Nombre del Aprendiz']);
            $aprendiz->__SET('Segundo Nombre del Aprendiz',        $_REQUEST['Segundo Nombre del Aprendiz']);
            $aprendiz->__SET('Primer Apellido del Aprendiz',       $_REQUEST['Primer Apellido del Aprendiz']);
            $aprendiz->__SET('Segundo Apellido del Aprendiz',      $_REQUEST['Segundo Apellido del Aprendiz']);
            $aprendiz->__SET('Correo del Aprendiz',                $_REQUEST['Correo del Aprendiz']);
            $aprendiz->__SET('Telefono del Aprendiz',              $_REQUEST['Telefono del Aprendiz']);
            $aprendiz->__SET('Ficha',                              $_REQUEST['Ficha']);
            $aprendiz->__SET('Estado del Aprendiz',                $_REQUEST['Estado del Aprendiz']);
            $aprendiz->__SET('Fecha de Creación del Aprendiz',     $_REQUEST['Fecha de Creación del Aprendiz']);
            $aprendiz->__SET('Fecha de Inacticación del Aprendiz', $_REQUEST['Fecha de Inacticación del Aprendiz']);

            $model->Registrar($aprendiz);
            header('Location: ../vistas/aprendiz.php');
            break;

        case 'eliminar':
            $model->Eliminar($_REQUEST['Documento']);
            header('Location: ../vistas/aprendiz.php');
            break;

        case 'editar':
            $aprendiz = $model->Obtener($_REQUEST['Documento']);
            break;
    }
}
?>