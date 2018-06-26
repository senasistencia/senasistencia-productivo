<?php
//clase inicializada
  class Cliente{
    //atributos de la tabla
    private $documentoCliente;//llave primaria
    private $primerNombre;
    private $segundoNombre;//opcional
    private $primerApellido;
    private $segundoApellido;//opcional
    private $correo;
    private $telefono;//opcional
    private $estado;
    private $fechaCreacion;
    private $fechaInactivacion;//opcional
    #las siguiente variables corresponden
    #a llaves foraneas de la tabla
    private $FK_tipoDocumento;//llave foranea del tipo de documento
    private $FK_perfil;//llave foranea del perfil
    private $FK_Rol;//no es una llave foranea en la base de datos

    private $FK_DocCliente;

    //metodos
    public function __SET($atributo,$valor)
    {
        return $this->$atributo = $valor;
    }

    public function __GET($atributo)
    {
      return $this->$atributo;
    }


  }
?>
