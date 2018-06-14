<?php
require('header.php');
require("../../clases/rol.php");

class RolModel
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
        $consulta = "SELECT * FROM rol";//el nombre de la tabla
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute();
        $tabla = $objeto->fetchAll(PDO::FETCH_OBJ);

        foreach ($tabla as $fila )
        {
            $rol = new Rol();//se instancia la clase que se esta haciendo
            $rol->__SET('id_rol', $fila->ID_Rol);//se llama el campo de la tabla que corresponda con el atributo de la clase
            $rol->__SET('tipo_rol',$fila->Tipo_Rol);//se repite segun los campos que hayan en la tabla
            $rol->__SET('estado',$fila->Estado_Rol);//se repite segun los campos que hayan en la tabla
            $rol->__SET('fechaCreacion',$fila->FechaDeCreacion_Rol);
            $result[] = $rol;//se mete en el arreglo result[] la varible con la clase
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
          $consulta ="SELECT*FROM rol WHERE ID_Rol = ?";
          $objeto = $this->PDO->prepare($consulta);
          $objeto->execute(array($id));
          $fila= $objeto->fetch(PDO::FETCH_OBJ);

            $rol = new Rol();//se instancia la clase que se esta haciendo
            $rol->__SET('id_rol', $fila->ID_Rol);//se llama el campo de la tabla que corresponda con el atributo de la clase
            $rol->__SET('tipo_rol',$fila->Tipo_Rol);//se repite segun los campos que hayan en la tabla
            $rol->__SET('estado',$fila->Estado_Rol);//se repite segun los campos que hayan en la tabla
            $rol->__SET('fechaCreacion',$fila->FechaDeCreacion_Rol);
          //repetir segun los campos de la tabla

      } catch (Exception $e) {
          die($e->getMessage());
      }
      return $rol;
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

$rol = new Rol();//reemplazar $programa y xNombreClase por el nombre de la clase


if (isset($_REQUEST['ac']))
{

  switch ($_REQUEST['ac']) {
    case 'registrar':

      $rol->__SET('id_rol',$_REQUEST['id']);
      $rol->__SET('tipo_rol',$_REQUEST['tipo_rol']);
      if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
      $rol->__SET('estado',$estado);
      $rol->__SET('fechaCreacion', date("y/m/d"));
      $consulta = "INSERT INTO rol (ID_Rol,Tipo_Rol,Estado_Rol,FechaDeCreacion_Rol) VALUES (?,?,?,?)";
      $objeto = $PDO->prepare($consulta);
      $objeto->execute(array( $rol->__GET('id_rol'),$rol->__GET('tipo_rol'),$rol->__GET('estado'),$rol->__GET('fechaCreacion')));
      header("Location: rol-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista
      
    break;
   case 'actualizar':
      $rol->__SET('id_rol',$_REQUEST['id']);
      $rol->__SET('tipo_rol',$_REQUEST['tipo_rol']);
      if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
      $rol->__SET('estado',$estado);
      $consulta = "UPDATE rol SET tipo_rol = ? , Estado_Rol = ? WHERE ID_Rol = ?";
      $objeto = $PDO->prepare($consulta);
      $objeto->execute(array( $rol->__GET('tipo_rol'),$rol->__GET('estado'),$programa->__GET('id_rol')));
   
    header("Location: rol-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista

    break;
    case 'editar':
      $consulta ="SELECT*FROM rol WHERE ID_Rol = ?";
      $objeto = $this->PDO->prepare($consulta);
      $objeto->execute(array($_REQUEST['id']));
      $fila= $objeto->fetch(PDO::FETCH_OBJ);

            $rol->__SET('id_rol', $fila->ID_Rol);//se llama el campo de la tabla que corresponda con el atributo de la clase
            $rol->__SET('tipo_rol',$fila->Tipo_Rol);//se repite segun los campos que hayan en la tabla
            $rol->__SET('estado',$fila->Estado_Rol);//se repite segun los campos que hayan en la tabla
            $rol->__SET('fechaCreacion',$fila->FechaDeCreacion_Rol);


      //header("Location: programa-v.php");
    break;
    case 'eliminar':
      $modelo->eliminar($_REQUEST['id']);
      header("Location: ../vistas/admin/rol-v.php");
    break;
    default:

    break;
  }

}
?>
<div class="container">
  <div class="row">
    <h3 class="center-align">Roles</h3><div class="divider"></div>
    <div class="col s12 m6 push-m3 formulario card">
        <form action="?ac=<?php echo $rol->__GET('id_rol') > 0 ? 'actualizar' : 'registrar';?> " method="post">
          <div class="container">
            <div class="row">
                <div class="section center-align">
                  <label class="titulo">ingresa los datos</label>
                </div>
                <div class="divider"></div>
                <div class="section">
                  <input type="hidden" name="id" value="<?php echo $rol->__GET('id_rol');?>" />
                  <input type="text" name="tipo_rol" placeholder="Roles" value="<?php echo $rol->__GET('tipo_rol');?>" />

                  <div class="col s12 m12 center-align">
                    Estado del rol:
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
    <th>Roles</th>
    <th>Estado</th>
    <th>Fecha</th>
    <th>editar</th>
    <th>eliminar</th>

    </tr>
  </thead>
<tbody>
<?php 
$consulta = "SELECT * FROM rol";//el nombre de la tabla
$objeto = $PDO->prepare($consulta);
$objeto->execute();
$tabla = $objeto->fetchAll(PDO::FETCH_OBJ);

foreach ($tabla as $fila )
{
            $rol = new Rol();//se instancia la clase que se esta haciendo
            $rol->__SET('id_rol', $fila->ID_Rol);//se llama el campo de la tabla que corresponda con el atributo de la clase
            $rol->__SET('tipo_rol',$fila->Tipo_Rol);//se repite segun los campos que hayan en la tabla
            $rol->__SET('estado',$fila->Estado_Rol);//se repite segun los campos que hayan en la tabla
            $rol->__SET('fechaCreacion',$fila->FechaDeCreacion_Rol);
    $result[] = $rol;
  }
foreach( $result as $fila){?>
  <tr>
    <td class="oculto"><?php echo $fila->__GET('id_rol');?></td>
    <td><?php echo $fila->__GET('tipo_rol');?></td>
    <td><?php echo $fila->__GET('estado')?></td>
    <td><?php echo $fila->__GET('fechaCreacion')?></td>
    <td>
      <a href="#?ac=editar&id=<?php echo $fila->__GET('id_rol')?>" name="boton" class="waves-effect waves-blue btn-flat grey-text text-darken-1"><i class="material-icons">edit</i></a>
    </td>
    <td>
      <a href="#?ac=eliminar&id=<?php echo $fila->__GET('id_rol');?>" name="boton" class="waves-effect waves-red btn-flat"><i class="material-icons">delete</i></a>
    </td>
  </tr>
<?php }?>
</tbody>
</table>












 
</div>

<?php 

require('footer.php');
?>