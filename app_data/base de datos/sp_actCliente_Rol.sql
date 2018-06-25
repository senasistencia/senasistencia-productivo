#
# Procedure "sp_actCliente_Rol"
#

DROP PROCEDURE IF EXISTS `sp_actCliente_Rol`;
CREATE PROCEDURE `sp_actCliente_Rol`(IN _doc BIGINT(16),IN _rol BIGINT(16))
BEGIN

UPDATE cliente_rol SET FK_DocCliente = _doc , FK_Rol = _rol WHERE FK_DocCliente = _doc;

END;
