<?php
require("../../clases/perfil.php");
class PerfilModel
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
      $consulta = $this->PDO->prepare("SELECT * FROM perfil");//el nombre de la tabla
      $consulta->execute();
      
     foreach ($consulta->fetchAll(PDO::FETCH_OBJ) as $fila )
      {
          $perfil = new Perfil();//se instancia la clase que se esta haciendo
          $perfil->__SET('id_perfil', $fila->ID_Perfil);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $perfil->__SET('tipo_perfil', $fila->Tipo_Perfil);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $perfil->__SET('estado',$fila->Estado_Perfil == 0 ? 'inactivo':'activo');//se repite segun los campos que hayan en la tabla
          $perfil->__SET('fechaCreacion',$fila->FechaDeCreacion_Perfil);
          $result[] = $perfil;       
          
        }
        return $result;//se devuelve el arreglo result
      } 
      catch (Exception $e)
      {
        die($e->getMessage());
      }
      
    }

    public function guardar(Perfil $perfil)
    {
      try
      {
        $consulta = "INSERT INTO perfil (ID_Perfil,Tipo_Perfil,Estado_Perfil,FechaDeCreacion_Perfil)
        VALUES (?,?,?,?)";
        $this->PDO->prepare($consulta)
        ->execute(array($perfil->__GET('id_perfil'),$perfil->__GET('tipo_perfil'),$perfil->__GET('estado'),
        $perfil->__GET('fechaCreacion')));    
    }
     catch (Exception $e)
      {
        die($e->getMessage());
      }
    }

   
    public function actualizar(Perfil $perfil)
    {
      
        $consulta = "UPDATE perfil SET Tipo_Perfil = ? , Estado_Perfil = ? WHERE ID_Perfil = ?";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute(array($perfil->__GET('tipo_perfil'),$perfil->__GET('estado'),$perfil->__GET('id_perfil')));
        echo "<script>alert('se actualizo el registro')</script";       
    
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
          $perfil->__SET('tipo_perfil', $fila->Tipo_Perfil);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $perfil->__SET('estado',$fila->Estado_Perfil);//se repite segun los campos que hayan en la tabla
          $perfil->__SET('fechaCreacion',$fila->FechaDeCreacion_Perfil);
          //repetir segun los campos de la tabla
          
        } catch (Exception $e) {
          die($e->getMessage());
      }
      return $perfil;
    }

}
?> 