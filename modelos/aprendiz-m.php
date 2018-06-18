<?php
require("../../clases/aprendiz.php");

class AprendizModel
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
      $consulta = "CALL sp_impAprendiz()";//el nombre de la tabla
      $objeto = $this->PDO->prepare($consulta);
      $objeto->execute();
      $tabla = $objeto->fetchAll(PDO::FETCH_OBJ);
      
      foreach ($tabla as $fila )
      {
          $aprendiz = new Aprendiz();//se instancia la clase que se esta haciendo
          $aprendiz->__SET('FK_tipoDocumento', $fila->Nombre_TipoDeDocumento);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $aprendiz->__SET('documentoAprendiz', $fila->Documento_Aprendiz);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $aprendiz->__SET('primerNombre',$fila->PrimerNombre_Aprendiz);//se repite segun los campos que hayan en la tabla
          $aprendiz->__SET('segundoNombre',$fila->SegundoNombre_Aprendiz);//se repite segun los campos que hayan en la tabla
          $aprendiz->__SET('primerApellido',$fila->PrimerApellido_Aprendiz);//se repite segun los campos que hayan en la tabla
          $aprendiz->__SET('segundoApellido',$fila->SegundoApellido_Aprendiz);//se repite segun los campos que hayan en la tabla
          $aprendiz->__SET('correo',$fila->Correo_Aprendiz);//se repite segun los campos que hayan en la tabla
          $aprendiz->__SET('telefono',$fila->Telefono_Aprendiz);//se repite segun los campos que hayan en la tabla
          $aprendiz->__SET('FK_ficha',$fila->Num_Ficha);//se repite segun los campos que hayan en la tabla
          $aprendiz->__SET('estado',$fila->Estado_Aprendiz == 0 ? 'inactivo':'activo');//se repite segun los campos que hayan en la tabla
          $aprendiz->__SET('fechaCreacion',$fila->FechaDeCreacion_Aprendiz);
          $result[] = $aprendiz;
        }

      } catch (Exception $e) {
        die($e->getMessage());
      }
      return $result;//se devuelve el arreglo result
    }

    public function guardar(Aprendiz $aprendiz)
    {
        $consulta = "INSERT INTO aprendiz (FK_TipoDeDocumento,Documento_Aprendiz,PrimerNombre_Aprendiz,SegundoNombre_Aprendiz,PrimerApellido_Aprendiz,
        SegundoApellido_Aprendiz,Correo_Aprendiz,Telefono_Aprendiz,FK_Ficha,Estado_Aprendiz,FechaDeCreacion_Aprendiz) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute(array( $aprendiz->__GET('FK_tipoDocumento'),$aprendiz->__GET('documentoAprendiz'),$aprendiz->__GET('primerNombre'),
        $aprendiz->__GET('segundoNombre'), $aprendiz->__GET('primerApellido'),$aprendiz->__GET('correo'),
        $aprendiz->__GET('telefono'), $aprendiz->__GET('FK_ficha'),
        $aprendiz->__GET('estado'),$aprendiz->__GET('fechaCreacion')));

    
    }

   
    public function actualizar(Aprendiz $aprendiz)
    {
        $consulta = "UPDATE aprendiz SET FK_TipoDeDocumento = ? , PrimerNombre_Aprendiz = ? , SegundoNombre_Aprendiz = ? , PrimerApellido_Aprendiz = ? , 
        SegundoApellido_Aprendiz = ?, Correo_Aprendiz = ?,Telefono_Aprendiz = ?,FK_Ficha = ?,Estado_Aprendiz= ? WHERE Documento_Aprendiz = ?";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute(array( $aprendiz->__GET('FK_TipoDeDocumento'),$aprendiz->__GET('PrimerNombre_Aprendiz'),
        $aprendiz->__GET('SegundoNombre_Aprendiz'),$aprendiz->__GET('PrimerApellido_Aprendiz'),$aprendiz->__GET('SegundoApellido_Aprendiz'),$aprendiz->__GET('Correo_Aprendiz'),$aprendiz->__GET('Telefono_Aprendiz'),
        $aprendiz->__GET('FK_Ficha'),$aprendiz->__GET('Estado_Aprendiz'),$aprendiz->__GET('Documento_Aprendiz')));
        echo "<script>alert('se actualizo el registro')</script";
    }




    public function editar($id)
    {
      try
      {
          $consulta ="SELECT*FROM aprendiz WHERE Documento_Aprendiz = ?";
          $objeto = $this->PDO->prepare($consulta);
          $objeto->execute(array($id));
          $fila= $objeto->fetch(PDO::FETCH_OBJ);

          $aprendiz = new Aprendiz();//se instancia la clase que se esta haciendo
          $aprendiz->__SET('FK_tipoDocumento', $fila->Nombre_TipoDeDocumento);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $aprendiz->__SET('documentoAprendiz', $fila->Documento_Aprendiz);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $aprendiz->__SET('primerNombre',$fila->PrimerNombre_Aprendiz);//se repite segun los campos que hayan en la tabla
          $aprendiz->__SET('segundoNombre',$fila->SegundoNombre_Aprendiz);//se repite segun los campos que hayan en la tabla
          $aprendiz->__SET('primerApellido',$fila->PrimerApellido_Aprendiz);//se repite segun los campos que hayan en la tabla
          $aprendiz->__SET('segundoApellido',$fila->SegundoApellido_Aprendiz);//se repite segun los campos que hayan en la tabla
          $aprendiz->__SET('correo',$fila->Correo_Aprendiz);//se repite segun los campos que hayan en la tabla
          $aprendiz->__SET('telefono',$fila->Telefono_Aprendiz);//se repite segun los campos que hayan en la tabla
          $aprendiz->__SET('FK_ficha',$fila->Num_Ficha);//se repite segun los campos que hayan en la tabla
          $aprendiz->__SET('estado',$fila->Estado_Aprendiz == 0 ? 'inactivo':'activo');//se repite segun los campos que hayan en la tabla
          $aprendiz->__SET('fechaCreacion',$fila->FechaDeCreacion_Aprendiz);
          //repetir segun los campos de la tabla

      } catch (Exception $e) {
          die($e->getMessage());
      }
      return $aprendiz;
    }

    public function consultartipdocumento()//reemplazar "XNombretabla" por el nombre de la tabla que correponda
    {
      try
      {
        $consulta = "SELECT `ID_TipoDeDocumento`, `Nombre_TipoDeDocumento` FROM tipo_de_documento";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute();
        $aprendiz = $objeto->fetchAll(PDO::FETCH_OBJ);
        return $aprendiz;
      } catch (Exception $e) {
        die($e->getMessage());
      }
    }
    public function consultarficha()//reemplazar "XNombretabla" por el nombre de la tabla que correponda
    {
      try
      {
        $consulta = "SELECT `ID_Ficha`, `Num_Ficha` FROM ficha";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute();
        $aprendiz = $objeto->fetchAll(PDO::FETCH_OBJ);
        return $aprendiz;
      } catch (Exception $e) {
        die($e->getMessage());
      }
    }  

}
?> 