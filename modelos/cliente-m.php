<?php
require("../../clases/cliente.php");

class ClienteModel
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
      $consulta = "CALL sp_impCliente()";//el nombre de la tabla
      $objeto = $this->PDO->prepare($consulta);
      $objeto->execute();
      $tabla = $objeto->fetchAll(PDO::FETCH_OBJ);
      
      foreach ($tabla as $fila)
      {
          $cliente = new Cliente();//se instancia la clase que se esta haciendo
          $cliente->__SET('FK_tipoDocumento', $fila->Nombre_TipoDeDocumento);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $cliente->__SET('documentocliente', $fila->Documento_Cliente);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $cliente->__SET('primerNombre',$fila->PrimerNombre_Cliente);//se repite segun los campos que hayan en la tabla
          $cliente->__SET('segundoNombre',$fila->SegundoNombre_Cliente);//se repite segun los campos que hayan en la tabla
          $cliente->__SET('primerApellido',$fila->PrimerApellido_Cliente);//se repite segun los campos que hayan en la tabla
          $cliente->__SET('segundoApellido',$fila->SegundoApellido_Cliente);//se repite segun los campos que hayan en la tabla
          $cliente->__SET('correo',$fila->Correo_Cliente);//se repite segun los campos que hayan en la tabla
          $cliente->__SET('telefono',$fila->Telefono_Cliente);//se repite segun los campos que hayan en la tabla
          $cliente->__SET('FK_perfil',$fila->Tipo_Perfil);//se repite segun los campos que hayan en la tabla
          $cliente->__SET('estado',$fila->Estado_Cliente == 0 ? 'inactivo':'activo');//se repite segun los campos que hayan en la tabla
          $cliente->__SET('fechaCreacion',$fila->FechaDeCreacion_Cliente);
          $result[] = $cliente;
        }

      } catch (Exception $e) {
        die($e->getMessage());
      }
      return $result;//se devuelve el arreglo result
    }

    public function guardar(Cliente $cliente)
    {
        $consulta = "INSERT INTO cliente (FK_TipoDeDocumento,Documento_Cliente,PrimerNombre_Cliente,SegundoNombre_Cliente,PrimerApellido_Cliente,
        SegundoApellido_Cliente,Correo_Cliente,Telefono_Cliente,Estado_Cliente,FechaDeCreacion_Cliente) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute(array( $cliente->__GET('FK_tipoDocumento'),$cliente->__GET('documentocliente'),$cliente->__GET('primerNombre'),
        $cliente->__GET('segundoNombre'), $cliente->__GET('primerApellido'),$cliente->__GET('correo'),
        $cliente->__GET('telefono'),$cliente->__GET('estado'),$cliente->__GET('fechaCreacion')));

    
    }

   
    public function actualizar(Cliente $cliente)
    {
        $consulta = "UPDATE cliente SET FK_TipoDeDocumento = ? , PrimerNombre_Cliente = ? , SegundoNombre_Cliente = ? , PrimerApellido_cliente = ? , 
        SegundoApellido_Cliente = ?, Correo_Cliente = ?,Telefono_Cliente = ?,Estado_Cliente= ? WHERE Documento_Cliente = ?";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute(array( $cliente->__GET('FK_TipoDeDocumento'),$cliente->__GET('primerNombre'),
        $cliente->__GET('segundoNombre'),$cliente->__GET('primerApellido'),$cliente->__GET('segundoApellido'),$cliente->__GET('correo'),$cliente->__GET('telefono'),
        $cliente->__GET('estado'),$cliente->__GET('documentocliente')));
        echo "<script>alert('se actualizo el registro')</script";
    }

    public function editar($id)
    {
      try
      {
          $consulta ="SELECT*FROM cliente WHERE Documento_Cliente = ?";
          $objeto = $this->PDO->prepare($consulta);
          $objeto->execute(array($id));
          $fila= $objeto->fetch(PDO::FETCH_OBJ);

          $cliente = new cliente();//se instancia la clase que se esta haciendo
          $cliente->__SET('FK_tipoDocumento', $fila->Nombre_TipoDeDocumento);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $cliente->__SET('documentocliente', $fila->Documento_Cliente);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $cliente->__SET('primerNombre',$fila->PrimerNombre_Cliente);//se repite segun los campos que hayan en la tabla
          $cliente->__SET('segundoNombre',$fila->SegundoNombre_Cliente);//se repite segun los campos que hayan en la tabla
          $cliente->__SET('primerApellido',$fila->PrimerApellido_Cliente);//se repite segun los campos que hayan en la tabla
          $cliente->__SET('segundoApellido',$fila->SegundoApellido_Cliente);//se repite segun los campos que hayan en la tabla
          $cliente->__SET('correo',$fila->Correo_Cliente);//se repite segun los campos que hayan en la tabla
          $cliente->__SET('telefono',$fila->Telefono_Cliente);//se repite segun los campos que hayan en la tabla
          $cliente->__SET('estado',$fila->Estado_Cliente == 0 ? 'inactivo':'activo');//se repite segun los campos que hayan en la tabla
          $cliente->__SET('fechaCreacion',$fila->FechaDeCreacion_cliente);
          //repetir segun los campos de la tabla

      } catch (Exception $e) {
          die($e->getMessage());
      }
      return $cliente;
    }

    public function consultartipdocumento()//reemplazar "XNombretabla" por el nombre de la tabla que correponda
    {
      try
      {
        $consulta = "SELECT `ID_TipoDeDocumento`, `Nombre_TipoDeDocumento` FROM tipo_de_documento";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute();
        $cliente = $objeto->fetchAll(PDO::FETCH_OBJ);
        return $cliente;
      } catch (Exception $e) {
        die($e->getMessage());
      }
    }  
}
?> 