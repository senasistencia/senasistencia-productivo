<?php
require("../../clases/rol.php");

class RolModel
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
      $consulta = "SELECT * FROM rol()";//el nombre de la tabla
      $objeto = $this->PDO->prepare($consulta);
      $objeto->execute();
      $tabla = $objeto->fetchAll(PDO::FETCH_OBJ);
      
     foreach ($tabla as $fila )
      {
          $rol = new Rol();//se instancia la clase que se esta haciendo
          $rol->__SET('id_rol', $fila->ID_Rol);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $rol->__SET('tipo_rol', $fila->Tipo_Rol);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $rol->__SET('estado',$fila->Estado_Rol == 0 ? 'inactivo':'activo');//se repite segun los campos que hayan en la tabla
          $rol->__SET('fechaCreacion',$fila->FechaDeCreacion_Rol);
          $result[] = $rol;
        }
      } catch (Exception $e) {
        die($e->getMessage());
      }
      return $result;//se devuelve el arreglo result
    }

    public function guardar(Rol $rol)
    {
        $consulta = "INSERT INTO rol (ID_Rol,Tipo_Rol,Estado_Rol,FechaDeCreacion_Rol
        VALUES (?,?,?,?)";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute(array( $rol->__GET('id_rol'),$rol->__GET('tipo_rol'),$rol->__GET('estado'),
        $rol->__GET('fechaCreacion')));

    
    }

   
    public function actualizar(Rol $rol)
    {
        $consulta = "UPDATE rol SET Tipo_Rol = ? , Estado_Rol = ? WHERE ID_Rol = ?";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute(array( $rol->__GET('tipo_rol'),$rol->__GET('estado'),
        $rol->__GET('id_rol')));
        echo "<script>alert('se actualizo el registro')</script";
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
          $rol->__SET('tipo_rol', $fila->Tipo_Rol);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $rol->__SET('estado',$fila->Estado_Rol == 0 ? 'inactivo':'activo');//se repite segun los campos que hayan en la tabla
          $rol->__SET('fechaCreacion',$fila->FechaDeCreacion_Rol);
          //repetir segun los campos de la tabla

      } catch (Exception $e) {
          die($e->getMessage());
      }
      return $rol;
    }

}
?> 