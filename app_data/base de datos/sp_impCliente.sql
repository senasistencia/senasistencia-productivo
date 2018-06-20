# Host: 127.0.0.1  (Version 5.5.5-10.1.22-MariaDB)
# Date: 2018-06-17 23:21:51
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Procedure "sp_impCliente"
#

DROP PROCEDURE IF EXISTS `sp_impCliente`;
CREATE PROCEDURE `sp_impCliente`()
SELECT Nombre_TipoDeDocumento,`Documento_Cliente`,`PrimerNombre_Cliente`,`SegundoNombre_Cliente`, `PrimerApellido_Cliente`,
`SegundoApellido_Cliente`,`Correo_Cliente`,`Telefono_Cliente`,`Tipo_Perfil`,`Estado_Cliente`,`FechaDeCreacion_Cliente`,`FechaDeInactivacion_Cliente`
FROM 
cliente inner join tipo_de_documento inner join perfil
on FK_TipoDeDocumento = ID_TipoDeDocumento and `FK_Perfil` = `ID_Perfil`;
