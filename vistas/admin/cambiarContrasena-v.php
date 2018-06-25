<?php
require('header.php');
require('../../controladores/cambiarContrasena-c.php');
?>
<div class="container">
  <div class="row">
    <h3 class="center-align">usuarios</h3><div class="divider"></div>
    <div class="col s12 m8 push-m2 formulario card">
        <form action="?ac=<?php echo $cliente->__GET('id_usuario') > 0 ? 'actualizar' : 'registrar';?> " method="post">
          <div class="container">
            <div class="row">
                <div class="section center-align">
                  <label class="titulo">Datos del usuario</label>
                </div>
                <div class="divider"></div>
                <div class="section">

                 <label>Usuario</label>
                    <select name="FK_docCliente" >
                    <?php foreach($modelo->buscarusuario() as $usu){?>
                      <option value="<?php echo $usu->Documento_Cliente?>"><?php echo $usu->Documento_Cliente." ".$usu->PrimerNombre_Cliente." ".$usu->SegundoNombre_Cliente." ".$usu->PrimerApellido_Cliente?> </option>
                       
                    <?php }?>                    
                    
                    </select>      
                      <<input type="hidden" id="FK_docCliente" name="FK_docCliente" values="send">
                       <button type="submit" class="btn cyan darken-4">Buscar</button>
                       <input type="password" name="password_hash" placeholder="Actualice contraseña*" value=<?php echo $usu->Password_Hash?>   required="true" />                            
                 
                        
                  <div class="col s12 m12 center-align">
                    Estado de la ficha:
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
                  <button type="submit" class="btn cyan darken-4">actualizar</button>
                </div>
            </div>
          </div>
        </form>
    </div> 
    </div>
    
    <td>
      <a href="?ac=editar&id=<?php echo $fila->__GET('id_usuario')?>" name="boton" class="waves-effect waves-blue btn-flat grey-text text-darken-1"><i class="material-icons">edit</i></a>
    </td>

  </tr>
</tbody>
</table>












 
</div>

<?php 

require('footer.php');
?>