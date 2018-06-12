<?php
require('../app_data/conexion.php');
 class CRUDaprendiz
 {
    public function Listar()
    {
        try
        {
            $result = array();

            $stm = $this->pdo->prepare("SELECT * FROM aprendiz");
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
            {
                $aprendiz = new Aprendiz();

                $aprendiz->__SET('Tipo de Documento', $r->FK_tipoDocumento);
                $aprendiz->__SET('Documento', $r->documentoAprendiz);
                $aprendiz->__SET('Primer Nombre del Aprendiz', $r->primerNombre);
                $aprendiz->__SET('Segundo Nombre del Aprendiz', $r->segundoNombre);
                $aprendiz->__SET('Primer Apellido del Aprendiz', $r->primerApellido);
                $aprendiz->__SET('Segundo Apellido del Aprendiz', $r->segundoApellido);
                $aprendiz->__SET('Correro del Aprendiz', $r->correo);
                $aprendiz->__SET('Telefono del Aprendiz', $r->telefono);
                $aprendiz->__SET('Ficha', $r->FK_ficha);
                $aprendiz->__SET('Estado del Aprendiz', $r->estado);
                $aprendiz->__SET('Fecha de Creación del Aprendiz', $r->fechaCreacion);
                $aprendiz->__SET('Fecha de Inacticación del Aprendiz', $r->fechaInactivacion);

                $result[] = $aprendiz;
            }

            return $result;
        }
        catch(Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function Buscar($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("SELECT * FROM aprendiz WHERE Documento = ?");
                      

            $stm->execute(array($id));
            $r = $stm->fetch(PDO::FETCH_OBJ);

            $aprendiz = new Aprendiz();

            $aprendiz->__SET('Tipo de Documento', $r->FK_tipoDocumento);
            $aprendiz->__SET('Documento', $r->documentoAprendiz);
            $aprendiz->__SET('Primer Nombre del Aprendiz', $r->primerNombre);
            $aprendiz->__SET('Segundo Nombre del Aprendiz', $r->segundoNombre);
            $aprendiz->__SET('Primer Apellido del Aprendiz', $r->primerApellido);
            $aprendiz->__SET('Segundo Apellido del Aprendiz', $r->segundoApellido);
            $aprendiz->__SET('Correro del Aprendiz', $r->correo);
            $aprendiz->__SET('Telefono del Aprendiz', $r->telefono);
            $aprendiz->__SET('Ficha', $r->FK_ficha);
            $aprendiz->__SET('Estado del Aprendiz', $r->estado);
            $aprendiz->__SET('Fecha de Creación del Aprendiz', $r->fechaCreacion);
            $aprendiz->__SET('Fecha de Inacticación del Aprendiz', $r->fechaInactivacion);


            return $aprendiz;
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Eliminar($id)
    {
        try 
        {
            $stm = $this->pdo
                      ->prepare("DELETE FROM aprendiz WHERE Documento = ?");                      

            $stm->execute(array($id));
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

    public function Actualizar(Aprendiz $data)
    {
        try 
        {
            
            $sql = "UPDATE aprendiz SET 
                        Tipo de Documento                  = ?,
                        Documento                          = ?,
                        Primer Nombre del Aprendiz         = ?, 
                        Segundo Nombre del Aprendiz        = ?,
                        Primer Apellido del Aprendiz       = ?,
                        Segundo Apellido del Aprendiz      = ?,
                        Correro del Aprendiz               = ?,
                        Telefono del Aprendiz              = ?,
                        Ficha                              = ?,
                        Fecha de Creación del Aprendiz     = ?,
                        Fecha de Inacticación del Aprendiz = ?
                    WHERE Documento = ?";

            $this->pdo->prepare($sql)
                 ->execute(
                array(
                    $data->__GET('Tipo de Documento'), 
                    $data->__GET('Documento'), 
                    $data->__GET('Primer Nombre del Aprendiz'),
                    $data->__GET('Segundo Nombre del Aprendiz'),
                    $data->__GET('Primer Apellido del Aprendiz'),
                    $data->__GET('Segundo Apellido del Aprendiz'), 
                    $data->__GET('Correro del Aprendiz'), 
                    $data->__GET('Telefono del Aprendiz'),
                    $data->__GET('Ficha'),
                    $data->__GET('Estado del Aprendiz'),
                    $data->__GET('Fecha de Creación del Aprendiz'),
                    $data->__GET('Fecha de Inacticación del Aprendiz')
                    )
                );
        } catch (Exception $e) 
        {
            die($e->getMessage());
        }
    }

 }
    
?>