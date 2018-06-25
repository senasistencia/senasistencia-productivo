#
# Procedure "sp_impUsuario"
#

DROP PROCEDURE IF EXISTS `sp_impUsuario`;
CREATE PROCEDURE `sp_impUsuario`()
BEGIN

SELECT ID_Usuario,`Documento_Cliente`,`Password_Hash`,`Estado_Usuario`, `FechaDeCreacion_Usuario`
FROM usuario INNER JOIN cliente ON FK_DocCliente = Documento_Cliente;

END;