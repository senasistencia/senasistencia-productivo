# Host: 127.0.0.1  (Version 5.5.5-10.1.22-MariaDB)
# Date: 2018-06-17 23:21:21
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Procedure "sp_impAprendiz"
#

DROP PROCEDURE IF EXISTS `sp_impAprendiz`;
CREATE PROCEDURE `sp_impAprendiz`()
BEGIN
SELECT Nombre_TipoDeDocumento,`Documento_Aprendiz`,`PrimerNombre_Aprendiz`,`SegundoNombre_Aprendiz`, `PrimerApellido_Aprendiz`,
`SegundoApellido_Aprendiz`,`Correo_Aprendiz`,`Telefono_Aprendiz`,`Num_Ficha`,`Estado_Aprendiz`,`FechaDeCreacion_Aprendiz`,`FechaDeInactivacion_Aprendiz`
FROM 
aprendiz inner join tipo_de_documento inner join ficha 
on FK_TipoDeDocumento = ID_TipoDeDocumento and FK_Ficha = ID_Ficha;

END;
