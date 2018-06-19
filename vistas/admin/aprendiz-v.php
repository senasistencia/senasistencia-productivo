<?php
require('header.php');
require('../../controladores/aprendiz-c.php');

?>
<div class="container">
  <div class="row">
    <h3 class="center-align">Aprendiz</h3><div class="divider"></div>
    <div class="col s12 m8 push-m2 formulario card">
        <form action="?ac=<?php echo $aprendiz->__GET('documentoAprendiz') > 0 ? 'actualizar' : 'registrar';?> " method="post">
          <div class="container">
            <div class="row">
                <div class="section center-align">
                  <label class="titulo">ingresa los datos</label>
                </div>
                <div class="divider"></div>
                <div class="section">
                  <input type="hidden" name="documentoAprendiz" value="<?php echo $aprendiz->__GET('documentoAprendiz');?>" />                         
                  
                  <label>Tipo de documento:</label>
                  <select name="FK_tipoDocumento">
                      <?php 
                      $laconsulta = $modelo->consultartipdocumento();
                      foreach ($laconsulta as $datos) {;?>

                        <option value="<?php echo $datos->ID_TipoDeDocumento ;?>" <?php echo $aprendiz->__GET('FK_tipoDocumento') == $datos->ID_TipoDeDocumento ? 'selected' : ''; ?> > <?php echo $datos->Nombre_TipoDeDocumento  ;?> </option>

                      <?php } ;?>
     
                  </select>                  
                  <input type="text" name="documentoAprendiz" placeholder="Documento del Aprendiz"        value="<?php echo $aprendiz->__GET('documentoAprendiz');?>" />
                  <input type="text" name="primerNombre"      placeholder="Primer nombre del Aprendiz"    value="<?php echo $aprendiz->__GET('primerNombre');?>" />
                  <input type="text" name="segundoNombre"     placeholder="Segundo nombre del Aprendiz"   value="<?php echo $aprendiz->__GET('segundoNombre');?>" />
                  <input type="text" name="primerApellido"    placeholder="Primero Apellido del Aprendiz" value="<?php echo $aprendiz->__GET('primerApellido');?>" />
                  <input type="text" name="segundoApellido"   placeholder="Segundo apellido del Aprendiz" value="<?php echo $aprendiz->__GET('segundoApellido');?>" />
                  <input type="text" name="correo"            placeholder="Correo del Aprenfdiz"          value="<?php echo $aprendiz->__GET('correo');?>" />
                  <input type="text" name="telefono"          placeholder="Telefono del Aprendiz"         value="<?php echo $aprendiz->__GET('telefono');?>" />
                  <label>Ficha del Aprendiz:</label>
                  <select name="FK_ficha">
                      <?php 
                      $laconsulta = $modelo->consultarficha();
                      foreach ($laconsulta as $datos) {;?>

                        <option value="<?php echo $datos->ID_Ficha ;?>" <?php echo $aprendiz->__GET('FK_ficha') == $datos->ID_Ficha ? 'selected' : ''; ?> > <?php echo $datos->Num_Ficha  ;?> </option>

                      <?php } ;?>
     
                  </select>  

                  <div class="col s12 m12 center-align">
                    Estado del aprendiz:
                    <div class="switch">
                      <label>
                        Inactivo
                        <input type="checkbox" <?php echo $aprendiz->__GET('estado') == 1 ? "checked=true" : ""; echo $aprendiz->__GET('estado') == '' ? "checked=true" : "";  ?> name="estado">
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
    <th class="oculto">documentoAprendiz</th>
    <th>Tipo de documento</th>
    <th>Documento</th>
    <th>Primer Nombre</th>
    <th>Segundo Nombre</th>
    <th>Primer Apellido</th>
    <th>Segundo Apellido</th>
    <th>Correo</th>
    <th>Telefono</th>
    <th>Ficha</th>
    <th>Fecha</th>
    <th>editar</th>
    </tr>
  </thead>
<tbody>
<?php 

foreach( $modelo->imprimirTabla() as $fila){?>
  <tr <?php echo $fila->__GET('estado')== 'inactivo' ? "class='deep-orange lighten-4'":''?>>
    <td><?php echo $fila->__GET('FK_tipoDocumento');?></td>
    <td><?php echo $fila->__GET('documentoAprendiz');?></td>
    <td><?php echo $fila->__GET('primerNombre')?></td>
    <td><?php echo $fila->__GET('segundoNombre')?></td>
    <td><?php echo $fila->__GET('primerApellido')?></td>
    <td><?php echo $fila->__GET('segundoApellido')?></td>
    <td><?php echo $fila->__GET('correo');?></td>
    <td><?php echo $fila->__GET('telefono')?></td>
    <td><?php echo $fila->__GET('estado')?></td>
    <td><?php echo $fila->__GET('fechaCreacion')?></td>
    
    <td>
      <a href="?action=editar&documentoAprendiz=<?php echo $fila->__GET('documentoAprendiz')?>" name="boton" class="waves-effect waves-blue btn-flat grey-text text-darken-1"><i class="material-icons">edit</i></a>
    </td>

  </tr>
<?php }?>
</tbody>
</table>












 
</div>

<?php 

require('footer.php');
?>