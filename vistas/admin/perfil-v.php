<?php
require('header.php');
require("../../clases/perfil.php");

class PerfilModel
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
        $consulta = "SELECT * FROM perfil";//el nombre de la tabla
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute();
        $tabla = $objeto->fetchAll(PDO::FETCH_OBJ);

        foreach ($tabla as $fila )
        {
            $perfil = new Perfil();//se instancia la clase que se esta haciendo
            $perfil->__SET('id_perfil', $fila->ID_Perfil);//se llama el campo de la tabla que corresponda con el atributo de la clase
            $perfil->__SET('tipo_perfil',$fila->Tipo_Perfil);//se repite segun los campos que hayan en la tabla
            $perfil->__SET('estado',$fila->Estado_Perfil);//se repite segun los campos que hayan en la tabla
            $perfil->__SET('fechaCreacion',$fila->FechaDeCreacion_Perfil);
            $result[] = $perfil;//se mete en el arreglo result[] la varible con la clase
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
          $consulta ="SELECT*FROM perfil WHERE ID_Perfil = ?";
          $objeto = $this->PDO->prepare($consulta);
          $objeto->execute(array($id));
          $fila= $objeto->fetch(PDO::FETCH_OBJ);

            $perfil = new Perfil();//se instancia la clase que se esta haciendo
            $perfil->__SET('id_perfil', $fila->ID_Perfil);//se llama el campo de la tabla que corresponda con el atributo de la clase
            $perfil->__SET('tipo_perfil',$fila->Tipo_Perfil);//se repite segun los campos que hayan en la tabla
            $perfil->__SET('estado',$fila->Estado_Perfil);//se repite segun los campos que hayan en la tabla
            $perfil->__SET('fechaCreacion',$fila->FechaDeCreacion_Perfil);
          //repetir segun los campos de la tabla

      } catch (Exception $e) {
          die($e->getMessage());
      }
      return $perfil;
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

$perfil = new Perfil();//reemplazar $programa y xNombreClase por el nombre de la clase


if (isset($_REQUEST['ac']))
{

  switch ($_REQUEST['ac']) {
    case 'registrar':

      $perfil->__SET('id_perfil',$_REQUEST['id']);
      $perfil->__SET('tipo_perfil',$_REQUEST['tipo_perfil']);
      if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
      $perfil->__SET('estado',$estado);
      $perfil->__SET('fechaCreacion', date("y/m/d"));
      $consulta = "INSERT INTO perfil (ID_Perfil,Tipo_Perfil,Estado_Perfil,FechaDeCreacion_Perfil) VALUES (?,?,?,?)";
      $objeto = $PDO->prepare($consulta);
      $objeto->execute(array( $perfil->__GET('id_perfil'),$perfil->__GET('tipo_perfil'),$perfil->__GET('estado'),$perfil->__GET('fechaCreacion')));
      header("Location: perfil-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista
      
    break;
   case 'actualizar':
      $perfil->__SET('id_perfil',$_REQUEST['id']);
      $perfil->__SET('tipo_perfil',$_REQUEST['tipo_perfil']);
      if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
      $perfil->__SET('estado',$estado);
      $consulta = "UPDATE perfil SET Tipo_Perfil = ? , Estado_Perfil = ? WHERE ID_Perfil = ?";
      $objeto = $PDO->prepare($consulta);
      $objeto->execute(array( $perfil->__GET('tipo_perfil'),$perfil->__GET('estado'),$perfil->__GET('id_perfil')));
   
    header("Location: perfil-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista

    break;
    case 'editar':
      $consulta ="SELECT*FROM perfil WHERE ID_Perfil = ?";
      $objeto = $this->PDO->prepare($consulta);
      $objeto->execute(array($_REQUEST['id']));
      $fila= $objeto->fetch(PDO::FETCH_OBJ);

      
            $perfil->__SET('id_perfil', $fila->ID_Perfil);//se llama el campo de la tabla que corresponda con el atributo de la clase
            $perfil->__SET('tipo_perfil',$fila->Tipo_Perfil);//se repite segun los campos que hayan en la tabla
            $perfil->__SET('estado',$fila->Estado_Perfil);//se repite segun los campos que hayan en la tabla
            $perfil->__SET('fechaCreacion',$fila->FechaDeCreacion_Perfil);


      //header("Location: programa-v.php");
    break;
    case 'eliminar':
      $modelo->eliminar($_REQUEST['id']);
      header("Location: ../vistas/admin/perfil-v.php");
    break;
    default:

    break;
  }

}
?>
<div class="container">
  <div class="row">
    <h3 class="center-align">Perfiles</h3><div class="divider"></div>
    <div class="col s12 m6 push-m3 formulario card">
        <form action="?ac=<?php echo $perfil->__GET('id_perfil') > 0 ? 'actualizar' : 'registrar';?> " method="post">
          <div class="container">
            <div class="row">
                <div class="section center-align">
                  <label class="titulo">ingresa los datos</label>
                </div>
                <div class="divider"></div>
                <div class="section">
                  <input type="hidden" name="id" value="<?php echo $perfil->__GET('id_perfil');?>" />
                  <input type="text" name="tipo_perfil" placeholder="Perfiles" value="<?php echo $perfil->__GET('tipo_perfil');?>" />

                  <div class="col s12 m12 center-align">
                    Estado del Perfil:
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
    <th>Perfiles</th>
    <th>Estado</th>
    <th>Fecha</th>
    <th>editar</th>
    <th>eliminar</th>

    </tr>
  </thead>
<tbody>
<?php 
$consulta = "SELECT * FROM perfil";//el nombre de la tabla
$objeto = $PDO->prepare($consulta);
$objeto->execute();
$tabla = $objeto->fetchAll(PDO::FETCH_OBJ);

foreach ($tabla as $fila )
{
            $perfil = new Perfil();//se instancia la clase que se esta haciendo
            $perfil->__SET('id_perfil', $fila->ID_Perfil);//se llama el campo de la tabla que corresponda con el atributo de la clase
            $perfil->__SET('tipo_perfil',$fila->Tipo_Perfil);//se repite segun los campos que hayan en la tabla
            $perfil->__SET('estado',$fila->Estado_Perfil);//se repite segun los campos que hayan en la tabla
            $perfil->__SET('fechaCreacion',$fila->FechaDeCreacion_Perfil);
    $result[] = $perfil;
  }
foreach( $result as $fila){?>
  <tr>
    <td class="oculto"><?php echo $fila->__GET('id_perfil');?></td>
    <td><?php echo $fila->__GET('tipo_perfil');?></td>
    <td><?php echo $fila->__GET('estado')?></td>
    <td><?php echo $fila->__GET('fechaCreacion')?></td>
    <td>
      <a href="#?ac=editar&id=<?php echo $fila->__GET('id_perfil')?>" name="boton" class="waves-effect waves-blue btn-flat grey-text text-darken-1"><i class="material-icons">edit</i></a>
    </td>
    <td>
      <a href="#?ac=eliminar&id=<?php echo $fila->__GET('id_perfil');?>" name="boton" class="waves-effect waves-red btn-flat"><i class="material-icons">delete</i></a>
    </td>
  </tr>
<?php }?>
</tbody>
</table>












 
</div>

<?php 

require('footer.php');
?>