<?php
require('header.php');
require("../../clases/ficha.php");

class FichaModel
{
//variable privada pdo
    Private $PDO;
    public function __construct()
    {
      try
      { 
        $this->PDO = new PDO("mysql:host=localhost;port=3308;dbname=senasistencia;charset=utf8","root","");
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
        $consulta = "SELECT * FROM ficha";//el nombre de la tabla
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute();
        $tabla = $objeto->fetchAll(PDO::FETCH_OBJ);

        foreach ($tabla as $fila )
        {
            $ficha = new Ficha();//se instancia la clase que se esta haciendo
            $ficha->__SET('id_ficha', $fila->ID_Ficha);//se llama el campo de la tabla que corresponda con el atributo de la clase
            $ficha->__SET('FK_programa', $fila->FK_Programa);//se llama el campo de la tabla que corresponda con el atributo de la clase
            $ficha->__SET('num_ficha',$fila->Num_Ficha);//se repite segun los campos que hayan en la tabla
            $ficha->__SET('grupo',$fila->Grupo_Ficha);//se repite segun los campos que hayan en la tabla
            $ficha->__SET('jornada',$fila->Jornada_Ficha);//se repite segun los campos que hayan en la tabla
            $ficha->__SET('trimestre',$fila->Trimestre_Ficha);//se repite segun los campos que hayan en la tabla
            $ficha->__SET('estado',$fila->Estado_Ficha);//se repite segun los campos que hayan en la tabla
            $ficha->__SET('fechaCreacion',$fila->FechaDeCreacion_Ficha);
            $ficha[] = $ficha;//se mete en el arreglo result[] la varible con la clase
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
          $consulta ="SELECT*FROM ficha WHERE ID_Ficha = ?";
          $objeto = $this->PDO->prepare($consulta);
          $objeto->execute(array($id));
          $fila= $objeto->fetch(PDO::FETCH_OBJ);

          $ficha = new Ficha();//se instancia la clase que se esta haciendo
            $ficha->__SET('id_ficha', $fila->ID_Ficha);//se llama el campo de la tabla que corresponda con el atributo de la clase
            $ficha->__SET('FK_programa', $fila->FK_Programa);//se llama el campo de la tabla que corresponda con el atributo de la clase
            $ficha->__SET('num_ficha',$fila->Num_Ficha);//se repite segun los campos que hayan en la tabla
            $ficha->__SET('grupo',$fila->Grupo_Ficha);//se repite segun los campos que hayan en la tabla
            $ficha->__SET('jornada',$fila->Jornada_Ficha);//se repite segun los campos que hayan en la tabla
            $ficha->__SET('trimestre',$fila->Trimestre_Ficha);//se repite segun los campos que hayan en la tabla
            $ficha->__SET('estado',$fila->Estado_Ficha);//se repite segun los campos que hayan en la tabla
            $ficha->__SET('fechaCreacion',$fila->FechaDeCreacion_Ficha);
          //repetir segun los campos de la tabla

      } catch (Exception $e) {
          die($e->getMessage());
      }
      return $ficha;
    }

    public function consultarPrograma()//reemplazar "XNombretabla" por el nombre de la tabla que correponda
    {
      try
      {
        $consulta = "SELECT ID_Programa, Nombre_Programa FROM programa_formacion";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute();
        $programa = $objeto->fetchAll(PDO::FETCH_OBJ);
        return $programa;
      } catch (Exception $e) {
        die($e->getMessage());
      }
    }
        
       

    
  


}
//aca comienza el controlador
    try
      { 
        $PDO = new PDO("mysql:host=localhost;port=3308;dbname=senasistencia;charset=utf8","root","");
        $PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //echo "se conecto";//probar conexion

      } catch (PDOException $error)
      {
        echo "no se conecto a la base de datos codigo de error: ";
        die($error->getMessage());
      }

$ficha = new Ficha();//reemplazar $programa y xNombreClase por el nombre de la clase
$modelo = new FichaModel();

if (isset($_REQUEST['ac']))
{

  switch ($_REQUEST['ac']) {
    case 'registrar':

      $ficha->__SET('id_ficha',$_REQUEST['id']);
      $ficha->__SET('FK_programa',$_REQUEST['FK_programa']);
      $ficha->__SET('num_ficha',$_REQUEST['num_ficha']);
      $ficha->__SET('grupo',$_REQUEST['grupo']);
      $ficha->__SET('jornada',$_REQUEST['jornada']);
      $ficha->__SET('trimestre',$_REQUEST['trimestre']);
      if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
      $ficha->__SET('estado',$estado);
      $ficha->__SET('fechaCreacion', date("y/m/d"));
      $consulta = "INSERT INTO ficha (ID_Ficha,FK_Programa,Num_Ficha,Grupo_Ficha,Jornada_Ficha,Trimestre_Ficha,Estado_Ficha,FechaDeCreacion_Ficha) VALUES (?,?,?,?,?,?,?,?)";
      $objeto = $PDO->prepare($consulta);
      $objeto->execute(array( $ficha->__GET('id_ficha'),$ficha->__GET('FK_programa'),$ficha->__GET('num_ficha'),
      $ficha->__GET('grupo'), $ficha->__GET('jornada'),$ficha->__GET('trimestre'),
      $ficha->__GET('estado'),$ficha->__GET('fechaCreacion')));
      header("Location: ficha-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista
      
    break;
   case 'actualizar':
      $ficha->__SET('id_ficha',$_REQUEST['id']);
      $ficha->__SET('FK_programa',$_REQUEST['FK_programa']);
      $ficha->__SET('num_ficha',$_REQUEST['num_ficha']);
      $ficha->__SET('grupo',$_REQUEST['grupo']);
      $ficha->__SET('jornada',$_REQUEST['jornada']);
      $ficha->__SET('trimestre',$_REQUEST['trimestre']);
      if(isset($_REQUEST['estado'])){$estado ='1';}else{ $estado ='0'; }
      $ficha->__SET('estado',$estado);

      $consulta = "UPDATE ficha SET FK_Programa = ? , Num_Ficha = ? , Grupo_Ficha = ? ,
      Jornada_Ficha = ? , Trimestre_Ficha = ?, Estado_Ficha = ? WHERE ID_Ficha = ?";
      $objeto = $PDO->prepare($consulta);
      $objeto->execute(array( $ficha->__GET('FK_programa'),$ficha->__GET('num_ficha'),
      $ficha->__GET('grupo'),$ficha->__GET('jornada'),$ficha->__GET('trimestre'),$ficha->__GET('estado'),$ficha->__GET('id_ficha')));
   
    header("Location: ficha-v.php");//reenplazar por  xnombreArchivo el nombre del archivo de la vista

    break;
    case 'editar':
      $consulta ="SELECT*FROM ficha WHERE ID_Ficha = ?";
      $objeto = $PDO->prepare($consulta);
      $objeto->execute(array($_REQUEST['id']));
      $fila= $objeto->fetch(PDO::FETCH_OBJ);

          /*  $ficha->__SET('id_ficha', $fila->ID_Ficha);//se llama el campo de la tabla que corresponda con el atributo de la clase
            $ficha->__SET('FK_programa', $fila->FK_Programa);//se llama el campo de la tabla que corresponda con el atributo de la clase
            $ficha->__SET('num_ficha',$fila->Num_Ficha);//se repite segun los campos que hayan en la tabla
            $ficha->__SET('grupo',$fila->Grupo_Ficha);//se repite segun los campos que hayan en la tabla
            $ficha->__SET('jornada',$fila->Jornada_Ficha);//se repite segun los campos que hayan en la tabla
            $ficha->__SET('trimestre',$fila->Trimestre_Ficha);//se repite segun los campos que hayan en la tabla
            $ficha->__SET('estado',$fila->Estado_Ficha);//se repite segun los campos que hayan en la tabla
            $ficha->__SET('fechaCreacion',$fila->FechaDeCreacion_Ficha);*/
      $ficha = $modelo->editar($_REQUEST['id']);

      //header("Location: ficha-v.php");
    break;
    case 'eliminar':
      
      echo "<script>var confi = confirm('¿seguro que desea eliminar el registro?'); 
      </script>";
       $confirma = "<script> document.write(confi) </script>";
      echo $confirma;
     /* if($confirma == false){
        echo "falso";
      }
      else{
        echo "verdad :)";
      }
      */
      //$modelo->eliminar($_REQUEST['id']);
      //header("Location: ../vistas/admin/ficha-v.php");
    break;
    default:

    break;
  }

}
?>
<div class="container">
  <div class="row">
    <h3 class="center-align">Fichas</h3><div class="divider"></div>
    <div class="col s12 m6 push-m3 formulario card">
        <form action="?ac=<?php echo $ficha->__GET('id_ficha') > 0 ? 'actualizar' : 'registrar';?> " method="post">
          <div class="container">
            <div class="row">
                <div class="section center-align">
                  <label class="titulo">ingresa los datos</label>
                </div>
                <div class="divider"></div>
                <div class="section">
                  <input type="hidden" name="id" value="<?php echo $ficha->__GET('id_ficha');?>" />
                  <input type="number" name="num_ficha" placeholder="Fichas" value="<?php echo $ficha->__GET('num_ficha');?>" />
                  
                  <label>Programa:</label>
                  <select name="FK_programa">
                      <?php 
                      $laconsulta = $modelo->consultarPrograma();
                      foreach ($laconsulta as $datos) {;?>

                        <option value="<?php echo $datos->ID_Programa ;?>" <?php echo $ficha->__GET('FK_programa') == $datos->ID_Programa ? 'selected' : ''; ?> > <?php echo $datos->Nombre_Programa  ;?> </option>

                      <?php } ;?>

                  </select>                  
                  <input type="text" name="grupo" placeholder="Grupo de la ficha" value="<?php echo $ficha->__GET('grupo');?>" />
                  <input type="text" name="jornada" placeholder="Jornada de la ficha" value="<?php echo $ficha->__GET('jornada');?>" />
                  <input type="text" name="trimestre" placeholder="trimestre de la ficha" value="<?php echo $ficha->__GET('trimestre');?>" />
                  

                  <div class="col s12 m12 center-align">
                    Estado de la ficha:
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
    <th>Programa</th>
    <th>Fichas</th>
    <th>Grupo</th>
    <th>Jornada</th>
    <th>Trimestre</th>
    <th>Estado</th>
    <th>Fecha</th>
    <th>editar</th>
    <th>eliminar</th>

    </tr>
  </thead>
<tbody>
<?php 
$consulta = "SELECT * FROM ficha";//el nombre de la tabla
$objeto = $PDO->prepare($consulta);
$objeto->execute();
$tabla = $objeto->fetchAll(PDO::FETCH_OBJ);

foreach ($tabla as $fila )
{
            $ficha = new Ficha();//se instancia la clase que se esta haciendo
            $ficha->__SET('id_ficha', $fila->ID_Ficha);//se llama el campo de la tabla que corresponda con el atributo de la clase
            $ficha->__SET('FK_programa', $fila->FK_Programa);//se llama el campo de la tabla que corresponda con el atributo de la clase
            $ficha->__SET('num_ficha',$fila->Num_Ficha);//se repite segun los campos que hayan en la tabla
            $ficha->__SET('grupo',$fila->Grupo_Ficha);//se repite segun los campos que hayan en la tabla
            $ficha->__SET('jornada',$fila->Jornada_Ficha);//se repite segun los campos que hayan en la tabla
            $ficha->__SET('trimestre',$fila->Trimestre_Ficha);//se repite segun los campos que hayan en la tabla
            $ficha->__SET('estado',$fila->Estado_Ficha);//se repite segun los campos que hayan en la tabla
            $ficha->__SET('fechaCreacion',$fila->FechaDeCreacion_Ficha);
    $result[] = $ficha;
  }
foreach( $result as $fila){?>
  <tr>
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
    <td>
      <a href="?ac=eliminar&id=<?php echo $fila->__GET('id_ficha');?>" name="boton" class="waves-effect waves-red btn-flat"><i class="material-icons">delete</i></a>
    </td>
  </tr>
<?php }?>
</tbody>
</table>












 
</div>

<?php 

require('footer.php');
?>