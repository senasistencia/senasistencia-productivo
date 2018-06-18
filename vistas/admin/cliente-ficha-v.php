<?php
require('header.php');
require('../../controladores/cliente-ficha-c.php');

?>
<div class="container">
  <div class="row">
    <h3 class="center-align">Fichas</h3><div class="divider"></div>
    <div class="col s12 m8 push-m2 formulario card">
        <form action="?ac=<?php echo $clficha->__GET('id_ficha') > 0 ? 'actualizar' : 'registrar';?> " method="post">
          <div class="container">
            <div class="row">
                <div class="section center-align">
                  <label class="titulo">ingresa los datos</label>
                </div>
                <div class="divider"></div>
                <div class="section">
                 <label>Instructor</label>
                  <select name="FK_docCliente">
                    <?php foreach($modelo->consultarusuario() as $datos){ ?>
                  
                  <option value="<?php echo = $datos ->Documento_Cliente"></option>
                  
                    <?php } ?>
                  </select>

                  
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