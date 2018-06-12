<?php
require('header.php');
require("../../clases/programaFormacion.php");

class ProgramaModel
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
        $consulta = "SELECT * FROM programa_formacion";//el nombre de la tabla
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute();
        $tabla = $objeto->fetchAll(PDO::FETCH_OBJ);

        foreach ($tabla as $fila )
        {
            $programa = new ProgramaFormacion();//se instancia la clase que se esta haciendo
            $programa->__SET('id_programa', $fila->ID_Programa);//se llama el campo de la tabla que corresponda con el atributo de la clase
            $programa->__SET('nombre',$fila->Nombre_Programa);//se repite segun los campos que hayan en la tabla
            $programa->__SET('estado',$fila->Estado_Programa);//se repite segun los campos que hayan en la tabla
            $programa->__SET('fechaCreacion',$fila->FechaDeCreacion_Programa);
            $result[] = $programa;//se mete en el arreglo result[] la varible con la clase
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
          $consulta ="SELECT*FROM programa_formacion WHERE ID_Programa = ?";
          $objeto = $this->PDO->prepare($consulta);
          $objeto->execute(array($id));
          $fila= $objeto->fetch(PDO::FETCH_OBJ);

          $programa = new ProgramaFormacion();//se instancia la clase que se esta haciendo
          $programa->__SET('id_programa', $fila->ID_Programa);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $programa->__SET('nombre',$fila->Nombre_Programa);//se repite segun los campos que hayan en la tabla
          $programa->__SET('estado',$fila->Estado_Programa);//se repite segun los campos que hayan en la tabla
          $programa->__SET('fechaCreacion',$fila->FechaDeCreacion_Programa);
          //repetir segun los campos de la tabla

      } catch (Exception $e) {
          die($e->getMessage());
      }
      return $programa;
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

$programa = new ProgramaFormacion();//reemplazar $programa y xNombreClase por el nombre de la clase


if (isset($_REQUEST['ac']))
{

  switch ($_REQUEST['ac']) {
    case 'registrar':

      $programa->__SET('id_programa',$_REQUEST['id']);
      $programa->__SET('nombre',$_REQUEST['nombre']);
      if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
      $programa->__SET('estado',$estado);
      $programa->__SET('fechaCreacion', date("y/m/d"));
      $consulta = "INSERT INTO programa_formacion (ID_Programa,Nombre_Programa,Estado_Programa,FechaDeCreacion_Programa) VALUES (?,?,?,?)";
      $objeto = $PDO->prepare($consulta);
      $objeto->execute(array( $programa->__GET('id_programa'),$programa->__GET('nombre'),$programa->__GET('estado'),$programa->__GET('fechaCreacion')));
      header("Location: programa-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista
      
    break;
   case 'actualizar':
      $programa->__SET('id_programa',$_REQUEST['id']);
      $programa->__SET('nombre',$_REQUEST['nombre']);
      if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
      $programa->__SET('estado',$estado);
      $consulta = "UPDATE programa_formacion SET Nombre_Programa = ? , Estado_Programa = ? WHERE ID_Programa = ?";
      $objeto = $PDO->prepare($consulta);
      $objeto->execute(array( $programa->__GET('nombre'),$programa->__GET('estado'),$programa->__GET('id_programa')));
   
    header("Location: programa-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista

    break;
    case 'editar':
      $consulta ="SELECT*FROM programa_formacion WHERE ID_Programa = ?";
      $objeto = $this->PDO->prepare($consulta);
      $objeto->execute(array($_REQUEST['id']));
      $fila= $objeto->fetch(PDO::FETCH_OBJ);

      $programa->__SET('id_programa', $fila->ID_Programa);//se llama el campo de la tabla que corresponda con el atributo de la clase
      $programa->__SET('nombre',$fila->Nombre_Programa);//se repite segun los campos que hayan en la tabla
      $programa->__SET('estado',$fila->Estado_Programa);//se repite segun los campos que hayan en la tabla
      $programa->__SET('fechaCreacion',$fila->FechaDeCreacion_Programa);


      //header("Location: programa-v.php");
    break;
    case 'eliminar':
      $modelo->eliminar($_REQUEST['id']);
      header("Location: ../vistas/admin/programa-v.php");
    break;
    default:

    break;
  }

}
?>
<div class="container">
  <div class="row">
    <h3 class="center-align">Programa Formación</h3><div class="divider"></div>
    <div class="col s12 m6 push-m3 formulario card">
        <form action="?ac=<?php echo $programa->__GET('id_programa') > 0 ? 'actualizar' : 'registrar';?> " method="post">
          <div class="container">
            <div class="row">
                <div class="section center-align">
                  <label class="titulo">ingresa los datos</label>
                </div>
                <div class="divider"></div>
                <div class="section">
                  <input type="hidden" name="id" value="<?php echo $programa->__GET('id_programa');?>" />
                  <input type="text" name="nombre" placeholder="Programa de formacion" value="<?php echo $programa->__GET('nombre');?>" />

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
    <th>Programa de Formacion</th>
    <th>Estado</th>
    <th>Fecha</th>
    <th>editar</th>
    <th>eliminar</th>

    </tr>
  </thead>
<tbody>
<?php 
$consulta = "SELECT * FROM programa_formacion";//el nombre de la tabla
$objeto = $PDO->prepare($consulta);
$objeto->execute();
$tabla = $objeto->fetchAll(PDO::FETCH_OBJ);

foreach ($tabla as $fila )
{
    $programa = new ProgramaFormacion();//se instancia la clase que se esta haciendo
    $programa->__SET('id_programa', $fila->ID_Programa);//se llama el campo de la tabla que corresponda con el atributo de la clase
    $programa->__SET('nombre',$fila->Nombre_Programa);//se repite segun los campos que hayan en la tabla
    $programa->__SET('estado',$fila->Estado_Programa);//se repite segun los campos que hayan en la tabla
    $programa->__SET('fechaCreacion',$fila->FechaDeCreacion_Programa);
    $result[] = $programa;
  }
foreach( $result as $fila){?>
  <tr>
    <td class="oculto"><?php echo $fila->__GET('id_programa');?></td>
    <td><?php echo $fila->__GET('nombre');?></td>
    <td><?php echo $fila->__GET('estado')?></td>
    <td><?php echo $fila->__GET('fechaCreacion')?></td>
    <td>
      <a href="#?ac=editar&id=<?php echo $fila->__GET('id_programa')?>" name="boton" class="waves-effect waves-blue btn-flat grey-text text-darken-1"><i class="material-icons">edit</i></a>
    </td>
    <td>
      <a href="#?ac=eliminar&id=<?php echo $fila->__GET('id_programa');?>" name="boton" class="waves-effect waves-red btn-flat"><i class="material-icons">delete</i></a>
    </td>
  </tr>
<?php }?>
</tbody>
</table>












 
</div>

<?php 

require('footer.php');
?>