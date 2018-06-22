<?php
require('header.php');
require('../../controladores/ficha-c.php');
?>
<div class="container">
  <div class="row">
    <h3 class="center-align">Fichas</h3><div class="divider"></div>
    <div class="col s12 m8 push-m2 formulario card">
        <form action="?ac=<?php echo $ficha->__GET('id_ficha') > 0 ? 'actualizar' : 'registrar';?> " method="post">
          <div class="container">
            <div class="row">
                <div class="section center-align">
                  <label class="titulo">ingresa los datos</label>
                </div>
                <div class="divider"></div>
                <div class="section">
                  <input type="hidden" name="id" value="<?php echo $ficha->__GET('id_ficha');?>" />
                  <input type="number" name="num_ficha" placeholder="Fichas" value="<?php echo $ficha->__GET('num_ficha');?>" />
                  
                  <label>Programa:</label>
                  <select name="FK_programa">
                      <?php 
                      $laconsulta = $modelo->consultarPrograma();
                      foreach ($laconsulta as $datos) {?>

                        <option value="<?php echo $datos->ID_Programa ;?>" <?php echo $ficha->__GET('FK_programa') == $datos->ID_Programa ? 'selected' : ''; ?> > <?php echo $datos->Nombre_Programa  ;?> </option>

                      <?php } ;?>

                  </select>                  
                  <input type="text" name="grupo" placeholder="Grupo de la ficha" value="<?php echo $ficha->__GET('grupo');?>" />
                  <input type="text" name="jornada" placeholder="Jornada de la ficha" value="<?php echo $ficha->__GET('jornada');?>" />
                  <input type="text" name="trimestre" placeholder="trimestre de la ficha" value="<?php echo $ficha->__GET('trimestre');?>" />
                  <!--enlista los instuctores a asociar-->
                  <label>Instructores</label>
                   <select name="instasoc">
                    <?php foreach($modelo->consultarusuario() as $instuctor){?>
                      <option value="<?php echo $instuctor->Documento_Cliente; ?>"><?php echo "CC: ".$instuctor->Documento_Cliente.", ".$instuctor->PrimerNombre_Cliente." ".$instuctor->PrimerApellido_Cliente." ".$instuctor->SegundoApellido_Cliente ?> </option>
                    <?php }?>                    
                    
                    </select>
                  <div class="col s12 m12 center-align">
                    Estado de la ficha:
                    <div class="switch">
                      <label>
                        Inactivo
                        <input type="checkbox" <?php echo $ficha->__GET('estado') == 1 ? "checked=true" : ""; echo $ficha->__GET('estado') == '' ? "checked=true" : "";  ?> name="estado">
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
    <th>Programa</th>
    <th>Fichas</th>
    <th>Grupo</th>
    <th>Jornada</th>
    <th>Trimestre</th>
    <th>Estado</th>
    <th>Fecha</th>
    <th>editar</th>
    </tr>
  </thead>
<tbody>
<?php 

foreach( $modelo->imprimirTabla() as $fila){?>
  <tr <?php echo $fila->__GET('estado')== 'inactivo' ? "class='deep-orange lighten-4'":''?>>
    <td class="oculto"><?php echo $fila->__GET('id_ficha');?></td>
    <td><?php echo $fila->__GET('FK_programa');?></td>
    <td><?php echo $fila->__GET('num_ficha')?></td>
    <td><?php echo $fila->__GET('grupo')?></td>
    <td><?php echo $fila->__GET('jornada')?></td>
    <td><?php echo $fila->__GET('trimestre')?></td>
    <td><?php echo $fila->__GET('estado')?></td>
    <td><?php echo $fila->__GET('fechaCreacion')?></td>
    
    <td>
      <a href="?ac=editar&id=<?php echo $fila->__GET('id_ficha')?>" name="boton" class="waves-effect waves-blue btn-flat grey-text text-darken-1"><i class="material-icons">edit</i></a>
    </td>

  </tr>
<?php }?>
</tbody>
</table>












 
</div>

<?php 

require('footer.php');
?>