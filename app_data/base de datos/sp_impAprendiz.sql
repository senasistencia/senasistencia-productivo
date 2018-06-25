#
# Procedure "sp_impAprendiz"
#

DROP PROCEDURE IF EXISTS `sp_impAprendiz`;
CREATE PROCEDURE `sp_impAprendiz`()
BEGIN

SELECT `Nombre_TipoDeDocumento`,`Documento_Aprendiz`,`PrimerNombre_Aprendiz`,`SegundoNombre_Aprendiz`, `PrimerApellido_Aprendiz`,
`SegundoApellido_Aprendiz`,`Correo_Aprendiz`,`Telefono_Aprendiz`,`Num_Ficha`,`Estado_Aprendiz`,`FechaDeCreacion_Aprendiz`,`FechaDeInactivacion_Aprendiz`
FROM aprendiz INNER JOIN tipo_de_documento INNER JOIN ficha 
ON FK_TipoDeDocumento = ID_TipoDeDocumento AND FK_Ficha = ID_Ficha;

END;
