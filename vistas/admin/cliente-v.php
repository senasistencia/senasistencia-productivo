<?php
require('header.php');
require('../../controladores/usuario-c.php');

?>
<div class="container">
  <div class="row">
    <h3 class="center-align">Usuario del Sistema</h3><div class="divider"></div>
    <div class="col s12 m8 push-m2 formulario card">
        <form action="?ac=<?php echo $usuario->__GET('documentoCliente') > 0 ? 'actualizar' : 'registrar';?> " method="post">
          <div class="container">
            <div class="row">
                <div class="section center-align">
                  <label class="titulo">ingresa los datos</label>
                </div>
                <div class="divider"></div>
                <div class="section">
                  <input type="hidden" name="id" value="<?php echo $usuario->__GET('documentoCliente');?>" />                         
                  
                  <label>Tipo de documento:</label>
                  <select name="FK_tipoDocumento">
                      <?php 
                      $laconsulta = $modelo->consultartipdocumento();
                      foreach ($laconsulta as $datos) {;?>

                        <option value="<?php echo $datos->ID_TipoDeDocumento ;?>" <?php echo $usuario->__GET('FK_tipoDocumento') == $datos->ID_TipoDeDocumento ? 'selected' : ''; ?> > <?php echo $datos->Nombre_TipoDeDocumento  ;?> </option>

                      <?php } ;?>
     
                  </select>                  
                  <input type="text" name="documentoCliente" placeholder="Documento del usuario"        value="<?php echo $usuario->__GET('documentoCliente');?>" />
                  <input type="text" name="primerNombre"      placeholder="Primer nombre del usuario"    value="<?php echo $usuario->__GET('primerNombre');?>" />
                  <input type="text" name="segundoNombre"     placeholder="Segundo nombre del usuario"   value="<?php echo $usuario->__GET('segundoNombre');?>" />
                  <input type="text" name="primerApellido"    placeholder="Primero Apellido del usuario" value="<?php echo $usuario->__GET('primerApellido');?>" />
                  <input type="text" name="segundoApellido"   placeholder="Segundo apellido del usuario" value="<?php echo $usuario->__GET('segundoApellido');?>" />
                  <input type="text" name="correo"            placeholder="Correo del usuario"          value="<?php echo $usuario->__GET('correo');?>" />
                  <input type="text" name="telefono"          placeholder="Telefono del usuario"         value="<?php echo $usuario->__GET('telefono');?>" />
                <div class="col s12 m12 center-align">
                    Estado del usuario:
                    <div class="switch">
                      <label>
                        Inactivo
                        <input type="checkbox" <?php echo $usuario->__GET('estado') == 1 ? "checked=true" : ""; echo $usuario->__GET('estado') == '' ? "checked=true" : "";  ?> name="estado">
                        <span class="lever"></span>
                        Activo
                      </label>
                    </div>
                  </div>
                </div>
                <div class="center align col s12 margen">
                  <button type="submit" class="btn cyan darken-4">Guardar</button>
                </div>
            </div>
          </div>
        </form>
    </div> 
    </div>

<h3 class="center-align">Registros</h3>
<div class="divider"></div>
<table class="striped bordered responsive-table">
  <thead>
  <tr>
    <th class="oculto">id</th>
    <th>Tipo de documento</th>
    <th>Documento</th>
    <th>Primer Nombre</th>
    <th>Segundo Nombre</th>
    <th>Primer Apellido</th>
    <th>Segundo Apellido</th>
    <th>Correo</th>
    <th>Telefono</th>
    <th>Fecha</th>
    <th>editar</th>
    </tr>
  </thead>
<tbody>
<?php 

foreach( $modelo->imprimirTabla() as $fila){?>
  <tr <?php echo $fila->__GET('estado')== 'inactivo' ? "class='deep-orange lighten-4'":''?>>
    <td><?php echo $fila->__GET('FK_tipoDocumento');?></td>
    <td><?php echo $fila->__GET('documentoCliente');?></td>
    <td><?php echo $fila->__GET('primerNombre')?></td>
    <td><?php echo $fila->__GET('segundoNombre')?></td>
    <td><?php echo $fila->__GET('primerApellido')?></td>
    <td><?php echo $fila->__GET('segundoApellido')?></td>
    <td><?php echo $fila->__GET('correo');?></td>
    <td><?php echo $fila->__GET('telefono')?></td>
    <td><?php echo $fila->__GET('estado')?></td>
    <td><?php echo $fila->__GET('fechaCreacion')?></td>
    
    <td>
      <a href="?ac=editar&id=<?php echo $fila->__GET('documentoCliente')?>" name="boton" class="waves-effect waves-blue btn-flat grey-text text-darken-1"><i class="material-icons">edit</i></a>
    </td>

  </tr>
<?php }?>
</tbody>
</table>












 
</div>

<?php 

require('footer.php');
?>