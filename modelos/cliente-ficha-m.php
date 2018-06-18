<?php
require("../../clases/cliente_ficha.php");

class Cliente_FichaModel
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
      $consulta = "CALL sp_impClienteFicha()";//el nombre de la tabla
      $objeto = $this->PDO->prepare($consulta);
      $objeto->execute();
      $tabla = $objeto->fetchAll(PDO::FETCH_OBJ);
      
      foreach ($tabla as $fila )
      {
          $clficha = new Cliente_Ficha();//se instancia la clase que se esta haciendo
          $clficha->__SET('FK_docCliente', $fila->Documento_Cliente);
          $clficha->__SET('FK_Ficha', $fila->Num_Ficha);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $result[] = $clficha;
        }

      } catch (Exception $e) {
        die($e->getMessage());
      }
      return $result;//se devuelve el arreglo result
    }

    public function guardar(Cliente_Ficha $clficha)
    {
        $consulta = "INSERT INTO cliente_ficha (`FK_DocCliente`,`FK_Ficha`) VALUES (?,?)";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute(array( $clficha->__GET('FK_docCliente'),$clficha->__GET('FK_Ficha')));

    
    }

   
    public function actualizar(Cliente_Ficha $clficha)
    {
        $consulta = "UPDATE cliente_ficha SET FK_Ficha = ? WHERE FK_DocCliente = ?";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute(array( $clficha->__GET('FK_docCliente'),$clficha->__GET('FK_Ficha')));
        echo "<script>alert('se actualizo el registro')</script";
    }

    public function editar($id)
    {
      try
      {
          $consulta ="SELECT*FROM cliente_ficha WHERE FK_DocCliente = ?";
          $objeto = $this->PDO->prepare($consulta);
          $objeto->execute(array($id));
          $fila= $objeto->fetch(PDO::FETCH_OBJ);

          $clficha = new Cliente_Ficha();//se instancia la clase que se esta haciendo
          $clficha->__SET('FK_docCliente', $fila->Documento_Cliente);
          $clficha->__SET('FK_Ficha', $fila->Num_Ficha);//se llama el campo de la tabla que corresponda con el atributo de la clase
          //repetir segun los campos de la tabla

      } catch (Exception $e) {
          die($e->getMessage());
      }
      return $clficha;
    }

    public function consultarusuario()//reemplazar "XNombretabla" por el nombre de la tabla que correponda
    {
      try
      {
        $consulta = "SELECT `Documento_Cliente`,`PrimerNombre_Cliente`,SegundoNombre_Cliente,PrimerApellido_Cliente,SegundoApellido_Cliente FROM cliente inner join perfil 
        on `FK_Perfil`= `ID_Perfil` and `Tipo_Perfil` = 'Instructor';";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute();
        $clficha = $objeto->fetchAll(PDO::FETCH_OBJ);
        return $clficha;
      } catch (Exception $e) {
        die($e->getMessage());
      }
    }
    public function consultarficha()//reemplazar "XNombretabla" por el nombre de la tabla que correponda
    {
      try
      {
        $consulta = "SELECT `ID_Ficha`, `Num_Ficha`,`Grupo_Ficha` FROM ficha";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute();
        $clficha = $objeto->fetchAll(PDO::FETCH_OBJ);
        return $clficha;
      } catch (Exception $e) {
        die($e->getMessage());
      }
    }  

}
?> 