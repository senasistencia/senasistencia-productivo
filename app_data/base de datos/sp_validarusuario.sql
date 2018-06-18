# Host: 127.0.0.1  (Version 5.5.5-10.1.32-MariaDB)
# Date: 2018-06-07 22:54:25
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Procedure "sp_validarUsuario"
#

DROP PROCEDURE IF EXISTS `sp_validarUsuario`;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_validarUsuario`(IN _usuario BIGINT(16),IN _pass VARCHAR(100))
BEGIN

SELECT Documento_Cliente,PrimerNombre_Cliente,Tipo_Rol FROM cliente inner JOIN cliente_rol inner JOIN rol

      ON cliente.Documento_Cliente = cliente_rol.FK_DocCliente AND rol.ID_Rol =  cliente_rol.FK_Rol 

      WHERE Documento_Cliente = (SELECT FK_DocCliente FROM usuario WHERE usuario.FK_DocCliente = _usuario AND usuario.Password_Hash = SHA1(_pass));

END;

