#
# Procedure "sp_asocCliente_Rol"
#

DROP PROCEDURE IF EXISTS `sp_asocCliente_Rol`;
CREATE PROCEDURE `sp_asocCliente_Rol`(IN _doc BIGINT(16),IN _idrol BIGINT(16))
BEGIN

INSERT INTO cliente_rol VALUES(_doc,_idrol); 

END;
