<?php
require('header.php');
require('../../controladores/programa-c.php');

?>
<div class="container">
  <div class="row">
    <h3 class="center-align">Programas</h3><div class="divider"></div>
    <div class="col s12 m6 push-m3 formulario card">
        <form action="?action=<?php echo $programa->__GET('id_programa') > 0 ? 'actualizar' : 'registrar';?> " method="post">
          <div class="container">
            <div class="row">
                <div class="section center-align">
                  <label class="titulo">ingresa los datos</label>
                </div>
                <div class="divider"></div>
                <div class="section">
                <input type="hidden" name="id" value="<?php echo $programa->__GET('id_programa');?>" />
                  <input type="text" name="nombre" placeholder="Programa" value="<?php echo $programa->__GET('nombre');?>" />

                  <div class="col s12 m12 center-align">
                    Estado del programa:
                    <div class="switch">
                      <label>
                        Inactivo
                        <input type="checkbox" checked="true" name="estado" value="true">
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
    <th>Programas</th>
    <th>Estado</th>
    <th>Fecha</th>
    <th>editar</th>

    </tr>
  </thead>
<tbody>
<?php 
foreach( $modelo->imprimirTabla() as $fila){?>
  <tr <?php echo $fila->__GET('estado')== 'inactivo' ? "class='deep-orange lighten-4'":''?>>
    <td class="oculto"><?php echo $fila->__GET('id_programa');?></td>
    <td><?php echo $fila->__GET('nombre');?></td>
    <td><?php echo $fila->__GET('estado')?></td>
    <td><?php echo $fila->__GET('fechaCreacion')?></td>
    
    <td>
      <a href="?action=editar&id=<?php echo $fila->__GET('id_programa')?>" name="boton" class="waves-effect waves-blue btn-flat grey-text text-darken-1"><i class="material-icons">edit</i></a>
    </td>

  </tr>
<?php }?>
</tbody>
</table>














 
</div>

<?php 

require('footer.php');
?>