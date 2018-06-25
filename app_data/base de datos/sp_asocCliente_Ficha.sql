#
# Procedure "sp_asocCliente_Ficha"
#

DROP PROCEDURE IF EXISTS `sp_asocCliente_Ficha`;
CREATE PROCEDURE `sp_asocCliente_Ficha`(IN _doc BIGINT(16),IN _idficha BIGINT(16))
BEGIN

INSERT INTO cliente_ficha VALUES(_doc,_idficha); 

END;
