<?php
require("../../clases/programaFormacion.php");
class ProgramaFormacionModel
{
//variable privada pdo
    Private $PDO;
    public function __construct($DB_server,$DB_puerto,$DB_baseDatos,$DB_user,$DB_pass)
    {
      try
      { 
        $this->PDO = new PDO("mysql:host=$DB_server;port=$DB_puerto;dbname=$DB_baseDatos;charset=utf8",$DB_user,$DB_pass);
        $this->PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //echo "se conecto";//probar conexion

      } catch (PDOException $error)
      {
        echo "no se conecto a la base de datos codigo de error: ";
        die($error->getMessage());
      }
    }
    //funcion para imprimir la tabla
    public function Imprimirtabla()
    {
      try {
      $consulta = $this->PDO->prepare("SELECT * FROM programa_formacion");//el nombre de la tabla
      $consulta->execute();
      
     foreach ($consulta->fetchAll(PDO::FETCH_OBJ) as $fila )
      {
          $programa = new ProgramaFormacion();//se instancia la clase que se esta haciendo
          $programa->__SET('id_programa', $fila->ID_Programa);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $programa->__SET('nombre', $fila->Nombre_Programa);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $programa->__SET('estado',$fila->Estado_Programa == 0 ? 'inactivo':'activo');//se repite segun los campos que hayan en la tabla
          $programa->__SET('fechaCreacion',$fila->FechaDeCreacion_Programa);
          $result[] = $programa;       
          
        }
        return $result;//se devuelve el arreglo result
      } 
      catch (Exception $e)
      {
        die($e->getMessage());
      }
      
    }

    public function guardar(ProgramaFormacion $programa)
    {
      try
      {
        $consulta = "INSERT INTO programa_formacion (ID_Programa,Nombre_Programa,
        Estado_Programa,FechaDeCreacion_Programa) VALUES (?,?,?,?)";
        $this->PDO->prepare($consulta)
        ->execute(array($programa->__GET('id_programa'),$programa->__GET('nombre'),$programa->__GET('estado'),
        $programa->__GET('fechaCreacion')));    
    }
     catch (Exception $e)
      {
        die($e->getMessage());
      }
    }

   
    public function actualizar(ProgramaFormacion $programa)
    {
      
        $consulta = "UPDATE programa_formacion SET Nombre_Programa = ?, Estado_Programa = ? WHERE ID_Programa = ?";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute(array($programa->__GET('nombre'),$programa->__GET('estado'),
        $programa->__GET('id_programa')));
        echo "<script>alert('se actualizo el registro')</script";       
    
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
          $programa->__SET('nombre', $fila->Nombre_Programa);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $programa->__SET('estado',$fila->Estado_Programa == 0 ? 'inactivo':'activo');//se repite segun los campos que hayan en la tabla
          $programa->__SET('fechaCreacion',$fila->FechaDeCreacion_Programa);
          //repetir segun los campos de la tabla
          
        } catch (Exception $e) {
          die($e->getMessage());
      }
      return $programa;
    }

}
?> 