<?php
require('header.php');
require('../../controladores/cliente-rol-c.php');

?>
<div class="container">
  <div class="row">
    <h3 class="center-align"> roles del usuario</h3><div class="divider"></div>
    <div class="col s12 m8 push-m2 formulario card">
        <form action="?ac=<?php echo $clficha->__GET('id_rol') > 0 ? 'actualizar' : 'registrar';?> " method="post">
          <div class="container">
            <div class="row">
                <div class="section center-align">
                  <label class="titulo">Selecciona el instructor y su ficha</label>
                </div>
                <div class="divider"></div>
                <div class="section">
                  <input type="hidden" name="id" value="<?php echo $clficha->__GET('id_rol');?>" />                        
                  
                  <label>Documento usuario:</label>
                  <select name="FK_tipoDocumento">
                      <?php 
                      $laconsulta = $modelo->consultarusuario();
                      foreach ($laconsulta as $datos) {;?>

                        <option value="<?php echo $datos->ID_TipoDeDocumento ;?>" <?php echo $clficha->__GET('FK_tipoDocumento') == $datos->ID_TipoDeDocumento ? 'selected' : ''; ?> > <?php echo $datos->Nombre_TipoDeDocumento  ;?> </option>

                      <?php } ;?>
     
                  </select>                  
                  <label>Ficha:</label>
                  <select name="FK_ficha">
                      <?php 
                      $laconsulta = $modelo->consultarficha();
                      foreach ($laconsulta as $datos) {;?>

                        <option value="<?php echo $datos->ID_Ficha ;?>" <?php echo $clficha->__GET('FK_ficha') == $datos->ID_Ficha ? 'selected' : ''; ?> > <?php echo $datos->Num_Ficha  ;?> </option>

                      <?php } ;?>
     
                  </select>  
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
    <th>Intructor</th>
    <th>Ficha</th>
    </tr>
  </thead>
<tbody>
<?php 

foreach( $modelo->imprimirTabla() as $fila){?>
  <tr <?php echo $fila->__GET('estado')== 'inactivo' ? "class='deep-orange lighten-4'":''?>>
    <td><?php echo $fila->__GET('FK_docCliente');?></td>
    <td><?php echo $fila->__GET('FK_Ficha');?></td>
        
    <td>
      <a href="?ac=editar&id=<?php echo $fila->__GET('FK_docCliente')?>" name="boton" class="waves-effect waves-blue btn-flat grey-text text-darken-1"><i class="material-icons">edit</i></a>
    </td>

  </tr>
<?php }?>
</tbody>
</table>












 
</div>

<?php 

require('footer.php');
?>