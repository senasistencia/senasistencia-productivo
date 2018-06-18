<?php
require("../../clases/ficha.php");

class FichaModel
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
      $consulta = "CALL sp_impFicha()";//el nombre de la tabla
      $objeto = $this->PDO->prepare($consulta);
      $objeto->execute();
      $tabla = $objeto->fetchAll(PDO::FETCH_OBJ);
      
      foreach ($tabla as $fila )
      {
          $ficha = new Ficha();//se instancia la clase que se esta haciendo
          $ficha->__SET('id_ficha', $fila->ID_Ficha);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $ficha->__SET('FK_programa', $fila->Nombre_Programa);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $ficha->__SET('num_ficha',$fila->Num_Ficha);//se repite segun los campos que hayan en la tabla
          $ficha->__SET('grupo',$fila->Grupo_Ficha);//se repite segun los campos que hayan en la tabla
          $ficha->__SET('jornada',$fila->Jornada_Ficha);//se repite segun los campos que hayan en la tabla
          $ficha->__SET('trimestre',$fila->Trimestre_Ficha);//se repite segun los campos que hayan en la tabla
          $ficha->__SET('estado',$fila->Estado_Ficha == 0 ? 'inactivo':'activo');//se repite segun los campos que hayan en la tabla
          $ficha->__SET('fechaCreacion',$fila->FechaDeCreacion_Ficha);
          $result[] = $ficha;
        }

      } catch (Exception $e) {
        die($e->getMessage());
      }
      return $result;//se devuelve el arreglo result
    }

    public function guardar(Ficha $ficha)
    {
        $consulta = "INSERT INTO ficha (ID_Ficha,FK_Programa,Num_Ficha,Grupo_Ficha,Jornada_Ficha,Trimestre_Ficha,Estado_Ficha,FechaDeCreacion_Ficha) VALUES (?,?,?,?,?,?,?,?)";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute(array( $ficha->__GET('id_ficha'),$ficha->__GET('FK_programa'),$ficha->__GET('num_ficha'),
        $ficha->__GET('grupo'), $ficha->__GET('jornada'),$ficha->__GET('trimestre'),
        $ficha->__GET('estado'),$ficha->__GET('fechaCreacion')));

    
    }

   
    public function actualizar(Ficha $ficha)
    {
        $consulta = "UPDATE ficha SET FK_Programa = ? , Num_Ficha = ? , Grupo_Ficha = ? , Jornada_Ficha = ? , Trimestre_Ficha = ?, Estado_Ficha = ? WHERE ID_Ficha = ?";
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute(array( $ficha->__GET('FK_programa'),$ficha->__GET('num_ficha'),
        $ficha->__GET('grupo'),$ficha->__GET('jornada'),$ficha->__GET('trimestre'),$ficha->__GET('estado'),$ficha->__GET('id_ficha')));
        echo "<script>alert('se actualizo perra')</script";
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
   
    public function fichasAsoc($documento)
    {
      try{
      $consulta = "CALL sp_fichasAsoc($documento)";//el nombre de la tabla
      $objeto = $this->PDO->prepare($consulta);
      $objeto->execute();
      $tabla = $objeto->fetchAll(PDO::FETCH_OBJ);
      
      foreach ($tabla as $fila )
      {
          $ficha = new Ficha();//se instancia la clase que se esta haciendo
          $ficha->__SET('id_ficha', $fila->ID_Ficha);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $ficha->__SET('FK_programa', $fila->Programa);//se llama el campo de la tabla que corresponda con el atributo de la clase
          $ficha->__SET('num_ficha',$fila->Num_Ficha);//se repite segun los campos que hayan en la tabla
          $ficha->__SET('grupo',$fila->Grupo_Ficha);//se repite segun los campos que hayan en la tabla
         // $ficha->__SET('jornada',$fila->Jornada_Ficha);//se repite segun los campos que hayan en la tabla
          $result[] = $ficha;
        }

      } catch (Exception $e) {
        die($e->getMessage());
      }
      return $result;//se devuelve el arreglo result
    }

}
?> 