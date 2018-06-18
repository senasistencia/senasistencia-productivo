<?php
require("../../clases/cliente_rol.php");

class Cliente_RolModel
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
    public function imprimirTabla()
    {
      try{
      $consulta = "CALL sp_impClienteRol()";//el nombre de la tabla
      $objeto = $this->PDO->prepare($consulta);
      $objeto->execute();
      $tabla = $objeto->fetchAll(PDO::FETCH_OBJ);
      
      foreach ($tabla as $fila )
      {
          $clrol = new Cliente_Rol();//se instancia la clase que se esta haciendo
          $clrol->__SET('FK_docCliente', $fila->Documento_Cliente);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $clrol->__SET('FK_Rol', $fila->Tipo_Rol);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $result[] = $clrol;
        }

      } catch (Exception $e) {
        die($e->getMessage());
      }
      return $result;//se devuelve el arreglo result
    }

    public function guardar(Cliente_Rol $clrol)
    {
        $consulta = "INSERT INTO cliente_rol (`FK_DocCliente`,`FK_Rol`) VALUES (?,?)";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute(array( $clrol->__GET('FK_docCliente'),$clrol->__GET('FK_Rol')));

    
    }

   
    public function actualizar(Cliente_Rol $clrol)
    {
        $consulta = "UPDATE cliente_rol SET FK_Rol = ? WHERE FK_DocCliente = ?";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute(array( $clrol->__GET('FK_docCliente'),$clrol->__GET('FK_Rol')));
        echo "<script>alert('se actualizo el registro')</script";
    }

    public function editar($id)
    {
      try
      {
          $consulta ="SELECT*FROM cliente_rol WHERE FK_DocCliente = ?";
          $objeto = $this->PDO->prepare($consulta);
          $objeto->execute(array($id));
          $fila= $objeto->fetch(PDO::FETCH_OBJ);

          $clrol = new Cliente_Ficha();//se instancia la clase que se esta haciendo
          $clrol->__SET('FK_docCliente', $fila->Documento_Cliente);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $clrol->__SET('FK_Rol', $fila->Tipo_Rol);//se llama el campo de la tabla que corresponda con el atributo de la clase
          //repetir segun los campos de la tabla

      } catch (Exception $e) {
          die($e->getMessage());
      }
      return $clrol;
    }

    public function consultarusuario()//reemplazar "XNombretabla" por el nombre de la tabla que correponda
    {
      try
      {
        $consulta = "SELECT `Documento_Cliente`,`PrimerNombre_Cliente`,SegundoNombre_Cliente,PrimerApellido_Cliente,SegundoApellido_Cliente FROM cliente";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute();
        $clficha = $objeto->fetchAll(PDO::FETCH_OBJ);
        return $aprendiz;
      } catch (Exception $e) {
        die($e->getMessage());
      }
    }
    public function consultarrol()//reemplazar "XNombretabla" por el nombre de la tabla que correponda
    {
      try
      {
        $consulta = "SELECT `ID_Rol`, `Tipo_Rol` FROM rol";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute();
        $clrol = $objeto->fetchAll(PDO::FETCH_OBJ);
        return $clrol;
      } catch (Exception $e) {
        die($e->getMessage());
      }
    }  

}
?> 