<?php
require('header.php');
require('../../controladores/cliente-c.php');

?>
<div class="container">
  <div class="row">
    <h3 class="center-align">Usuario del sistema</h3><div class="divider"></div>
    <div class="col s12 m8 push-m2 formulario card">
        <form action="?ac=<?php echo $cliente->__GET('documentoCliente') ? 'actualizar' : 'registrar';?> " method="post">
          <div class="container">
            <div class="row">
                <div class="section center-align">
                  <label class="titulo">ingresa los datos</label>
                </div>
                <div class="divider"></div>
                <div class="section">
                                    
                  <label>Tipo de documento:</label>
                  <select name="FK_tipoDocumento" >
                      <?php 
                      $laconsulta = $modelo->consultartipodocumento();
                      foreach ($laconsulta as $datos) {;?>

                        <option value="<?php echo $datos->ID_TipoDeDocumento ;?>" <?php echo $cliente->__GET('FK_tipoDocumento') == $datos->ID_TipoDeDocumento ? 'selected' : ''; ?> > <?php echo $datos->Nombre_TipoDeDocumento  ;?> </option>

                      <?php } ;?>
     
                  </select>                  
                  <input type="text" name="documentoCliente" placeholder="Documento del Usuario*"    required="true"   value="<?php echo $cliente->__GET('documentoCliente');?>" />
                  <input type="text" name="primerNombre"      placeholder="Primer nombre del Usuario*"  required="true"  value="<?php echo $cliente->__GET('primerNombre');?>" />
                  <input type="text" name="segundoNombre"     placeholder="Segundo nombre del Usuario"   value="<?php echo $cliente->__GET('segundoNombre');?>" />
                  <input type="text" name="primerApellido"    placeholder="Primero Apellido del Usuario*" required="true"value="<?php echo $cliente->__GET('primerApellido');?>" />
                  <input type="text" name="segundoApellido"   placeholder="Segundo apellido del Usuario" value="<?php echo $cliente->__GET('segundoApellido');?>" />
                  <label>Perfil del usuario:</label>
                  <select name="FK_perfil" >
                      <?php 
                      $laconsulta = $modelo->consultarperfil();
                      foreach ($laconsulta as $datos) {;?>

                        <option value="<?php echo $datos->ID_Perfil ;?>" <?php echo $cliente->__GET('FK_perfil') == $datos->ID_Perfil ? 'selected' : ''; ?> > <?php echo $datos->Tipo_Perfil  ;?> </option>

                      <?php } ;?>
     
                  </select> 
                  <input type="email" name="correo" placeholder="Correo del Usuario*" required="true" value="<?php echo $cliente->__GET('correo');?>" />
                  <input type="text" name="telefono" placeholder="Telefono del Usuario" value="<?php echo $cliente->__GET('telefono');?>" />
                  
                  <!--ingreso del rol al ususario-->
                   <label>Rol del Usuario</label>
                   <select name="rolusuario">
                    <?php foreach($modelo->consultarrol() as $rol){?>
                      <option value="<?php echo $rol->ID_Rol; ?>" <?php echo $cliente->__GET('FK_Rol') == $rol->ID_Rol ? 'selected' : ''; ?> ><?php echo $rol->Tipo_Rol?> </option>
                    <?php }?>                    
                    
                    </select>
                     <input type="<?php echo isset($_GET['ac'])!='editar' ? 'password':'hidden' ?>" placeholder= "Ingrese la contraseña" name="pass"/>
                  <div class="col s12 m12 center-align">
                    Estado del Usuario:
                    <div class="switch">
                      <label>
                        Inactivo
                        <input type="checkbox" <?php echo $cliente->__GET('estado') == 1 ? "checked=true" : ""; echo $cliente->__GET('estado') == '' ? "checked=true" : "";  ?> name="estado">
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
    <th class="oculto">documentoCliente</th>
    <th>Tipo de documento</th>
    <th>Documento</th>
    <th>Primer Nombre</th>
    <th>Segundo Nombre</th>
    <th>Primer Apellido</th>
    <th>Segundo Apellido</th>
    <th>Correo</th>
    <th>Telefono</th>
    <th>Perfil</th>
    <th>Estado</th>
    <th>Fecha</th>
    <th>editar</th>
    </tr>
  </thead>
<tbody>
<?php 

foreach( $modelo->imprimirTabla() as $fila){?>
  <tr <?php echo $fila->__GET('estado') == 'inactivo' ? "class='deep-orange lighten-4'":''?>>
    <td><?php echo $fila->__GET('FK_tipoDocumento');?></td>
    <td><?php echo $fila->__GET('documentoCliente');?></td>
    <td><?php echo $fila->__GET('primerNombre')?></td>
    <td><?php echo $fila->__GET('segundoNombre')?></td>
    <td><?php echo $fila->__GET('primerApellido')?></td>
    <td><?php echo $fila->__GET('segundoApellido')?></td>
    <td><?php echo $fila->__GET('correo');?></td>
    <td><?php echo $fila->__GET('telefono')?></td>
    <td><?php echo $fila->__GET('FK_perfil')?></td>
    <td><?php echo $fila->__GET('estado')?></td>
    <td><?php echo $fila->__GET('fechaCreacion')?></td>
    
    <td>
      <a href="?ac=editar&doc=<?php echo $fila->__GET('documentoCliente')?>" name="boton" class="waves-effect waves-blue btn-flat grey-text text-darken-1"><i class="material-icons">edit</i></a>
    </td>

  </tr>
<?php }?>
</tbody>
</table>












 
</div>

<?php 

require('footer.php');
?>