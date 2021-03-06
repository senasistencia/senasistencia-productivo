<?php
require('header.php');
require('../../controladores/perfil-c.php');

?>
<div class="container">
  <div class="row">
    <h3 class="center-align">Perfiles</h3><div class="divider"></div>
    <div class="col s12 m6 push-m3 formulario card">
        <form action="?action=<?php echo $perfil->__GET('id_perfil') > 0 ? 'actualizar' : 'registrar';?> " method="post">
          <div class="container">
            <div class="row">
                <div class="section center-align">
                  <label class="titulo">ingresa los datos</label>
                </div>
                <div class="divider"></div>
                <div class="section">
                <input type="hidden" name="id" value="<?php echo $perfil->__GET('id_perfil');?>" />
                  <input type="text" name="tipo_perfil" placeholder="Perfil*" required="true" value="<?php echo $perfil->__GET('tipo_perfil');?>" />

                  <div class="col s12 m12 center-align">
                    Estado del perfil:
                    <div class="switch">
                      <label>
                        Inactivo
                        <input type="checkbox" <?php echo $perfil->__GET('estado') == 1 ? "checked=true" : ""; echo $perfil->__GET('estado') == '' ? "checked=true" : "";  ?> name="estado" value="true">
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

<h3 class="center-align">Resultados</h3>
<div class="divider"></div>
<table class="striped bordered">
  <thead>
  <tr>
    <th class="oculto">id</th>
    <th>Perfiles</th>
    <th>Estado</th>
    <th>Fecha</th>
    <th>editar</th>

    </tr>
  </thead>
<tbody>
<?php 
foreach( $modelo->imprimirTabla() as $fila){?>
  <tr <?php echo $fila->__GET('estado')== 'inactivo' ? "class='deep-orange lighten-4'":''?>>
    <td class="oculto"><?php echo $fila->__GET('id_perfil');?></td>
    <td><?php echo $fila->__GET('tipo_perfil');?></td>
    <td><?php echo $fila->__GET('estado')?></td>
    <td><?php echo $fila->__GET('fechaCreacion')?></td>
    
    <td>
      <a href="?action=editar&id=<?php echo $fila->__GET('id_perfil')?>" name="boton" class="waves-effect waves-blue btn-flat grey-text text-darken-1"><i class="material-icons">edit</i></a>
    </td>

  </tr>
<?php }?>
</tbody>
</table>














 
</div>

<?php 

require('footer.php');
?>