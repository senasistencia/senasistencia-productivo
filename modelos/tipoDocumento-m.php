<?php
require("../../clases/tipoDocumento.php");
class TipoDocumentoModel
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
      $consulta = $this->PDO->prepare("SELECT * FROM tipo_de_documento");//el nombre de la tabla
      $consulta->execute();
      
     foreach ($consulta->fetchAll(PDO::FETCH_OBJ) as $fila )
      {
          $documento = new TipoDocumento();//se instancia la clase que se esta haciendo
          $documento->__SET('id_tipoDocumento', $fila->ID_TipoDeDocumento);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $documento->__SET('nombreTipoDocumento', $fila->Nombre_TipoDeDocumento);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $documento->__SET('estado',$fila->Estado_TipoDeDocumento == 0 ? 'inactivo':'activo');//se repite segun los campos que hayan en la tabla
          $documento->__SET('fechaCreacion',$fila->FechaDeCreacion_TipoDeDocumento);
          $result[] = $documento;       
          
        }
        return $result;//se devuelve el arreglo result
      } 
      catch (Exception $e)
      {
        die($e->getMessage());
      }
      
    }

    public function guardar(TipoDocumento $documento)
    {
      try
      {
        $consulta = "INSERT INTO tipo_de_documento (ID_TipoDeDocumento,Nombre_TipoDeDocumento,
        Estado_TipoDeDocumento,FechaDeCreacion_TipoDeDocumento) VALUES (?,?,?,?)";
        $this->PDO->prepare($consulta)
        ->execute(array($documento->__GET('id_tipoDocumento'),$documento->__GET('nombreTipoDocumento'),$documento->__GET('estado'),
        $documento->__GET('fechaCreacion')));    
    }
     catch (Exception $e)
      {
        die($e->getMessage());
      }
    }

   
    public function actualizar(TipoDocumento $documento)
    {
      
        $consulta = "UPDATE tipo_de_documento SET Nombre_TipoDeDocumento = ?, Estado_TipoDeDocumento = ? WHERE ID_TipoDeDocumento = ?";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute(array($documento->__GET('nombreTipoDocumento'),$documento->__GET('estado'),
        $documento->__GET('id_tipoDocumento')));
        echo "<script>alert('se actualizo el registro')</script";       
    
    }
    public function editar($id)
    {
      try
      {
        $consulta ="SELECT*FROM tipo_de_documento WHERE ID_TipoDeDocumento = ?";
          $objeto = $this->PDO->prepare($consulta);
          $objeto->execute(array($id));
          $fila= $objeto->fetch(PDO::FETCH_OBJ);

          $documento = new TipoDocumento();//se instancia la clase que se esta haciendo
          $documento->__SET('id_tipoDocumento', $fila->ID_TipoDeDocumento);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $documento->__SET('nombreTipoDocumento', $fila->Nombre_TipoDeDocumento);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $documento->__SET('estado',$fila->Estado_TipoDeDocumento == 0 ? 'inactivo':'activo');//se repite segun los campos que hayan en la tabla
          $documento->__SET('fechaCreacion',$fila->FechaDeCreacion_TipoDeDocumento);
          //repetir segun los campos de la tabla
          
        } catch (Exception $e) {
          die($e->getMessage());
      }
      return $documento;
    }

}
?> 