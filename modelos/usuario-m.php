<?php
require("../../clases/usuario.php");
class UsuarioModel
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
      $consulta = $this->PDO->prepare("CALL sp_impUsuario()");//el nombre de la tabla
      $consulta->execute();
      
     foreach ($consulta->fetchAll(PDO::FETCH_OBJ) as $fila )
      {
          $rol = new Rol();//se instancia la clase que se esta haciendo
          $rol->__SET('id_usuario', $fila->ID_Usuario);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $rol->__SET('FK_docCliente', $fila->Documento_Cliente);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $rol->__SET('password_hash', $fila->Password_Hash);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $rol->__SET('estado',$fila->Estado_Usuario == 0 ? 'inactivo':'activo');//se repite segun los campos que hayan en la tabla
          $rol->__SET('fechaCreacion',$fila->FechaDeCreacion_Usuario);
          $result[] = $rol;       
          
        }
        return $result;//se devuelve el arreglo result
      } 
      catch (Exception $e)
      {
        die($e->getMessage());
      }
      
    }

    public function guardar(Usuario $usuario)
    {
      try
      {
          $usuario->__SET('fechaCreacion',$fila->FechaDeCreacion_Usuario);
          $consulta = "INSERT INTO usuario (ID_Usuario,FK_DocCliente,Password_Hash,Estado_Usuario,FechaDeCreacion_Usuario)
        VALUES (?,?,?,?,?)";
        $this->PDO->prepare($consulta)
        ->execute(array($usuario->__GET('id_usuario'),$usuario->__GET('FK_docCliente'),$usuario->__GET('password_hash'),$usuario->__GET('estado'),
        $usuario->__GET('fechaCreacion')));    
    }
     catch (Exception $e)
      {
        die($e->getMessage());
      }
    }

   
    public function actualizar(Usuario $usuario)
    {
      
        $consulta = "UPDATE usuario SET FK_DocCliente = ? , Password_Hash = ?, Estado_Usuario = ?,FechaDeCreacion_Usuario = ? WHERE ID_Usuario = ?";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute(array($usuario->__GET('FK_docCliente'),$usuario->__GET('password_hash'),$usuario->__GET('estado'),$usuario->__GET('fechaCreacion'),$usuario->__GET('id_usuario')));
        echo "<script>alert('se actualizo el registro')</script";       
    
    }
    public function editar($id)
    {
      try
      {
        $consulta ="SELECT*FROM usuario WHERE ID_Usuario = ?";
          $objeto = $this->PDO->prepare($consulta);
          $objeto->execute(array($id));
          $fila= $objeto->fetch(PDO::FETCH_OBJ);

          $usuario = new Usuario();//se instancia la clase que se esta haciendo
          $usuario->__SET('id_usuario', $fila->ID_Usuario);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $usuario->__SET('FK_docCliente', $fila->FK_DocCliente);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $usuario->__SET('password_hash', $fila->Password_Hash);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $usuario->__SET('estado',$fila->Estado_Usuario == 0 ? 'inactivo':'activo');//se repite segun los campos que hayan en la tabla
          $usuario->__SET('fechaCreacion',$fila->FechaDeCreacion_Usuario);
          //repetir segun los campos de la tabla
          
        } catch (Exception $e) {
          die($e->getMessage());
      }
      return $usuario;
    }

}
?> 