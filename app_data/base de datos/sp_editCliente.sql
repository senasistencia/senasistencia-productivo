#
# Procedure "sp_editCliente"
#

DROP PROCEDURE IF EXISTS `sp_editCliente`;
CREATE PROCEDURE `sp_editCliente`(IN _doc BIGINT(16))
BEGIN

SELECT `FK_TipoDeDocumento`, `Documento_Cliente`, `PrimerNombre_Cliente`, `SegundoNombre_Cliente`, `PrimerApellido_Cliente`, `SegundoApellido_Cliente`, `Correo_Cliente`, `Telefono_Cliente`, `FK_Perfil`, `Estado_Cliente`, FK_Rol FROM cliente 
INNER JOIN cliente_rol ON Documento_Cliente = cliente_rol.FK_DocCliente WHERE Documento_Cliente = _doc;

END;
