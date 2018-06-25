#
# Procedure "sp_impCliente"
#

DROP PROCEDURE IF EXISTS `sp_impCliente`;
CREATE PROCEDURE `sp_impCliente`()
BEGIN

SELECT `Nombre_TipoDeDocumento`,`Documento_Cliente`,`PrimerNombre_Cliente`,`SegundoNombre_Cliente`, `PrimerApellido_Cliente`,
`SegundoApellido_Cliente`,`Correo_Cliente`,`Telefono_Cliente`,`Tipo_Perfil`,`Estado_Cliente`,`FechaDeCreacion_Cliente`,`FechaDeInactivacion_Cliente`

FROM cliente INNER JOIN tipo_de_documento INNER JOIN perfil
ON FK_TipoDeDocumento = ID_TipoDeDocumento AND `FK_Perfil` = `ID_Perfil`;

END;
