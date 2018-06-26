<?php
require('header.php');
require('../../controladores/cambiarContrasena-c.php');

?>
<div class="container">
  <div class="row">
    <h3 class="center-align">Usuarios</h3><div class="divider"></div>
    <div class="col s12 m6 push-m3 formulario card">
        <form action="?ac=<?php echo $cliente->__GET('id_usuario') == 0 ? 'actualizar' : 'registrar';?> " method="post">
          <div class="container">
            <div class="row">
                <div class="section center-align">
                  <label class="titulo">ingresa los datos</label>
                </div>
                <div class="divider"></div>
                <div class="section">
                <input type="hidden" name="id" value="<?php echo $cliente->__GET('id_usuario');?>" />
                  <input type="text" name="FK_docCliente" placeholder="usuario" readonly="readonly" value="<?php echo $cliente->__GET('FK_docCliente');?>" />
                  <input type="password" name="password_hash" placeholder="Actualice contraseña*"  required="true" value="<?php echo $cliente->__GET('password_hash');?>" />

                  <div class="col s12 m12 center-align">
                    Estado del usuario:
                    <div class="switch">
                      <label>
                        Inactivo
                        <input type="checkbox" <?php echo $cliente->__GET('estado') == 1 ? "checked=true" : ""; echo $cliente->__GET('estado') == '' ? "checked=true" : "";  ?> name="estado" value="true">
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
    <th>Usuario</th>
    <th>Estado</th>
    <th>Fecha</th>
    <th>editar</th>

    </tr>
  </thead>
<tbody>
<?php 
foreach( $modelo->imprimirTabla() as $fila){?>
  <tr <?php echo $fila->__GET('estado')== 'inactivo' ? "class='deep-orange lighten-4'":''?>>
    <td class="oculto"><?php echo $fila->__GET('id_usuario');?></td>
    <td><?php echo $fila->__GET('FK_docCliente');?></td>
    <td><?php echo $fila->__GET('estado')?></td>
    <td><?php echo $fila->__GET('fechaCreacion')?></td>
    
    <td>
      <a href="?ac=editar&id=<?php echo $fila->__GET('id_usuario')?>" name="boton" class="waves-effect waves-blue btn-flat grey-text text-darken-1"><i class="material-icons">edit</i></a>
    </td>

  </tr>
<?php }?>
</tbody>
</table>














 
</div>

<?php 

require('footer.php');
?>