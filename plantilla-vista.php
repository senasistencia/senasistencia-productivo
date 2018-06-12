<?php
require("../controlador/xtabla-control.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>nombre de la tabla</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"  type="text/css" href="../css/estilos.css">
  </head>
  <body>
    <div class="contenedor">
      <h1>nombre de la tabla</h1>
      <!--formulario de la tabla-->
      <form action="?ac=<?php echo $xclase->__GET('xxxid:clase') > 0 'actualizar' : 'registrar';?> " method="post">
        <input type="hidden" name="id" value="<?php echo $xclase->__GET('xxxid:clase');?>">
        <!--
          AQUI VAN A PONER LAS ETIQUETAS SEGUN LOS CAMPOS DELA TABLA
          CON EL METODO __GET EN EL CAMPO VALUE SI ES UN INPUT "CAJA DE TEXTO"
          NO OLVIDAR EL echo DENTRO DE LAS ETIQUETAS PHP
        -->
        <label>lo que quieren que vaya en la caja de texto</label><!--label no es funcional solo decoracion-->
        <input type="text" name="XXCAMPO" value="<?php echo $xclase->__GET('xatributo:clase') ;?>"><br />
        <!--CUANDO SEAN LLAVES FORANEAS
        VAN A USAR UN SELECT CON LO SIGUIENTE
        -->
        <label>campo desplegable</label>
        <select name="xxcampo">
            <?php foreach ($modelo->consultarXNombretabla() as $datos) {;?>

              <option value="<?php echo $datos->xxCampoID ;?>" <?php echo $xclase->__GET('xid:clase') == $datos->xxCampoID ? 'selected' : ''; ?> > <?php echo $datos->xxCampoTabla  ;?> </option>

            <?php } ;?>

        </select>
        <button  class="bt" type="submit" name="button">Guardar</button>
      </form>

  <!--tabla-->
        <table>
            <thead>
              <th>las cabeceras de las columnas</th><!--cada th es una columna-->

              <!--estas dos de ultimas-->
              <th>Editar</th>
              <th>Eliminar</th>
            </thead>
            <?php foreach ($modelo->imprimirTabla() as $campo) {?>
              <td><?php echo $campo->__GET('XXaattibuto');?></td><!--segun campos tabla-->
              <td>
              <!--los campos-->
              <td>
                <button type="button" class="bt" name="button"><a href="?ac=editar&id=<?php echo $campo->__GET('xid:clase');?>">Editar</a></button>
              </td>
              <td>
                <button type="button" class="eliminar" name="button"><a href="?ac=eliminar&id=<?php echo $campo->__GET('xid:clase');?>">Eliminar</a></button>

              </td>
              </td>
            <?php } ?>
        </table>
    </div>

  </body>
</html>
