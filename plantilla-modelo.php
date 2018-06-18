<?php
//nombre de la clase segun la tabla unida con la palabea Modelo
class xxplantillaModelo
{
//variable privada pdo
  

    //funcion para imprimir la tabla
    public function imprimirTabla()
    {
      try
      {
        $consulta = "SELECT * FROM xxnombretabla";//el nombre de la tabla
        $objeto = $this->PDO->prepare($consulata);
        $objeto->execute();
        $tabla = $objeto->fetchAll(PDO::FETCH_OBJ);

        foreach ($tabla as $fila )
        {
            $xxnombreclase = new xxnombreclase();//se instancia la clase que se esta haciendo
            $xxnombreclase->__SET('xid:clase', $fila->xxcampoTabla);//se llama el campo de la tabla que corresponda con el atributo de la clase
            $xxnombreclase->__SET('xatributo:clase',$fila->xxcampoTabla);//se repite segun los campos que hayan en la tabla

            $result[] = $xxnombreclase;//se mete en el arreglo result[] la varible con la clase
        }

      } catch (Exception $e) {
        die($e->getMessage());
      }

      return $result;//se devuelve el arreglo result
    }


    //funcion para crear un registro en la trabla
    public function crear($datos)
    {
      try
      {
        // remplazar por el nombre de la tabla y los campos correspondientes
        //se deben poner signos de interrogacion segun la cantidad de campos que tenga la tabla
        $consulta = "INSERT INTO xxnombretabla (xcampo1 , xcampo2, etc..) VALUES (?,?,etc..)";
        $objeto = $this->PDO->prepare($consulata);
        //se debe llenar el array con los atributos de la clase en orden segun corresponda y coincida con los de la tabla
        $objeto->execute(array( $datos->__GET('xid:clase'),$datos->__GET('xatributo2:clase'),$datos->__GET('xatributo3:clase')));

      } catch (Exception $e) {
        die($e->getMessage());
      }

    }

    //funcion para actualizar
    public function actualizar($datos)
    {
        try
        {
            $consulta = "UPDATE xnombretabla SET xcampo1 = ?, xcampo2 = ? WHERE xID_tabla = ?";
            $objeto = $this->PDO->prepare($consulata);
            $objeto->execute(array($datos->__GET('xatributo1:clase'),$datos->__GET('xatributo2:clase'),etc..,/*DE ULTIMAS SE COLOCA EL atributo id de la clase*/$datos->__GET('xid:clase')));

        } catch (Exception $e) {
          die($e->getMessage());
        }

    }

    //funcion para editar
    public function editar($id)
    {
      try
      {
          $consulta ="SELECT*FROM xnombretabla WHERE xID_tabla = ?";
          $objeto = $this->PDO->prepare($consulata);
          $objeto->execute(array($id));
          $campo = $objeto->fetch(PDO::FETCH_OBJ);

          $xclase = new xnombreclase();//se instancia la clase que se esta haciendo
          $xclase->__SET('xid:clase',$campo->xId_tabla);//xId_tabla corresponde al campo de la tabla de la base de datos
          $xclase->__SET('xatributo1:clase',$campo->xcampoTabla);
          //repetir segun los campos de la tabla

      } catch (Exception $e) {
          die($e->getMessage());
      }
      return $xclase;//se devuelve la variable con la clase
    }

    //funcion para eliminar

    public function eliminar($id)
    {
      try
      {
        $consulta = "DELETE FROM xnombretabla WHERE XID_tabla = ?";//nombre y id segun talba
        $objeto = $this->PDO->prepare($consulta);
        $objeto->execute(array($id));

      } catch (Exception $e) {
        echo "<b>¡NO SE PUEDE ELIMINAR EL REGISTRO DEBIDO A QUE OTRAS TABLAS DEPENDE DE ESTE!</b><br /> CAMBIE SU INFORMACION O BORRE LAS TABLAS DEPENDIAENTES<br /> codigo de error: <br />";
        die($e->getMessage());
      }
    }


    //funcion para consultar datos de tablas ajenas
    //esta funcion debe repetirse segun los atributos a llaves ajenas, osea segun datos de otras TABLAS
    public function consulatarXNombretabla()//reemplazar "XNombretabla" por el nombre de la tabla que correponda
    {
      try
      {
        $consulta = "SELECT * FROM xnombretablaAJENA";
        $objeto = $this->PDO->prepare($consulata);
        $objeto->execute();
        $xnombreTablaAJENA = $objeto->fetchAll(PDO::FETCH_OBJ);
        return $xnombreTablaAJENA;
      } catch (Exception $e) {
        die($e->getMessage());
      }
    }


}



?>
