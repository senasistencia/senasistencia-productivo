    <?php
require('header.php');
require("../../clases/tipoDocumento.php");

class DocumentoModel
{
//variable privada pdo
    Private $PDO;
    public function __construct()
    {
      try
      { 
        $this->PDO = new PDO("mysql:host=localhost;port=3306;dbname=senasistencia;charset=utf8","root","");
        $this->PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //echo "se conecto";//probar conexion

      } catch (PDOException $error)
      {
        echo "no se conecto a la base de datos codigo de error: ";
        die($error->getMessage());
      }
    }
    //funcion para imprimir la tabla
    public function imprimirTabla()
    {

      try
      {
        $consulta = "SELECT * FROM tipo_de_documento";//el nombre de la tabla
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute();
        $tabla = $objeto->fetchAll(PDO::FETCH_OBJ);

        foreach ($tabla as $fila )
        {
            $documento = new TipoDocumento();//se instancia la clase que se esta haciendo
            $documento->__SET('id_tipoDocumento', $fila->ID_TipoDeDocumento);//se llama el campo de la tabla que corresponda con el atributo de la clase
            $documento->__SET('nombreTipoDocumento',$fila->Nombre_TipoDeDocumento);//se repite segun los campos que hayan en la tabla
            $documento->__SET('estado',$fila->Estado_TipoDeDocumento);//se repite segun los campos que hayan en la tabla
            $documento->__SET('fechaCreacion',$fila->FechaDeCreacion_TipoDeDocumento);
            $result[] = $documento;//se mete en el arreglo result[] la varible con la clase
        }

      } catch (Exception $e) {
        die($e->getMessage());
      }
      return $result;//se devuelve el arreglo result
    }

    public function editar($id)
    {
      try
      {
          $consulta ="SELECT*FROM tipo_de_documento WHERE ID_TipoDeDocumento = ?";
          $objeto = $this->PDO->prepare($consulta);
          $objeto->execute(array($id));
          $fila= $objeto->fetch(PDO::FETCH_OBJ);

          $documento = new TipoDocumento();//se instancia la clase que se esta haciendo
            $documento->__SET('id_tipoDocumento', $fila->ID_TipoDeDocumento);//se llama el campo de la tabla que corresponda con el atributo de la clase
            $documento->__SET('nombreTipoDocumento',$fila->Nombre_TipoDeDocumento);//se repite segun los campos que hayan en la tabla
            $documento->__SET('estado',$fila->Estado_TipoDeDocumento);//se repite segun los campos que hayan en la tabla
            $documento->__SET('fechaCreacion',$fila->FechaDeCreacion_TipoDeDocumento);
          //repetir segun los campos de la tabla

      } catch (Exception $e) {
          die($e->getMessage());
      }
      return $documento;
    }

   
        
       

    
  


}
    try
      { 
        $PDO = new PDO("mysql:host=localhost;port=3306;dbname=senasistencia;charset=utf8","root","");
        $PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //echo "se conecto";//probar conexion

      } catch (PDOException $error)
      {
        echo "no se conecto a la base de datos codigo de error: ";
        die($error->getMessage());
      }


?>
<div class="container">
  <div class="row">
    <h3 class="center-align">Tipo de Documento</h3><div class="divider"></div>
    <div class="col s12 m6 push-m3 formulario card">
        <form action="?ac=<?php echo $documento->__GET('id_tipoDocumento') > 0 ? 'actualizar' : 'registrar';?> " method="post">
          <div class="container">
            <div class="row">
                <div class="section center-align">
                  <label class="titulo">ingresa los datos</label>
                </div>
                <div class="divider"></div>
                <div class="section">
                  <input type="hidden" name="id" value="<?php echo $documento->__GET('id_tipoDocumento');?>" />
                  <input type="text" name="nombreTipoDocumento" placeholder="Tipo de documento" value="<?php echo $documento->__GET('nombreTipoDocumento');?>" />

                  <div class="col s12 m12 center-align">
                    Estado del tipo de documento:
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
    <th>Tipo de Documento</th>
    <th>Estado</th>
    <th>Fecha</th>
    <th>editar</th>
    <th>eliminar</th>

    </tr>
  </thead>
<tbody>
<?php 
$consulta = "SELECT * FROM tipo_de_documento";//el nombre de la tabla
$objeto = $PDO->prepare($consulta);
$objeto->execute();
$tabla = $objeto->fetchAll(PDO::FETCH_OBJ);

foreach ($tabla as $fila )
{
       $documento = new TipoDocumento();//se instancia la clase que se esta haciendo
       $documento->__SET('id_tipoDocumento', $fila->ID_TipoDeDocumento);//se llama el campo de la tabla que corresponda con el atributo de la clase
       $documento->__SET('nombreTipoDocumento',$fila->Nombre_TipoDeDocumento);//se repite segun los campos que hayan en la tabla
       $documento->__SET('estado',$fila->Estado_TipoDeDocumento);//se repite segun los campos que hayan en la tabla
       $documento->__SET('fechaCreacion',$fila->FechaDeCreacion_TipoDeDocumento);
    $result[] = $documento;
  }
foreach( $result as $fila){?>
  <tr>
    <td class="oculto"><?php echo $fila->__GET('id_tipoDocumento');?></td>
    <td><?php echo $fila->__GET('nombreTipoDocumento');?></td>
    <td><?php echo $fila->__GET('estado')?></td>
    <td><?php echo $fila->__GET('fechaCreacion')?></td>
    <td>
      <a href="#?ac=editar&id=<?php echo $fila->__GET('id_tipoDocumento')?>" name="boton" class="waves-effect waves-blue btn-flat grey-text text-darken-1"><i class="material-icons">edit</i></a>
    </td>
    <td>
      <a href="#?ac=eliminar&id=<?php echo $fila->__GET('id_tipoDocumento');?>" name="boton" class="waves-effect waves-red btn-flat"><i class="material-icons">delete</i></a>
    </td>
  </tr>
<?php }?>
</tbody>
</table>












 
</div>

<?php 

require('footer.php');
?>