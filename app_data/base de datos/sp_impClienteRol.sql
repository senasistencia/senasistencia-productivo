#
# Procedure "sp_impClienteRol"
#

DROP PROCEDURE IF EXISTS `sp_impClienteRol`;
CREATE PROCEDURE `sp_impClienteRol`()
BEGIN

SELECT `Documento_Cliente`,`Tipo_Rol` FROM cliente_rol 
inner join cliente inner join rol
on `FK_DocCliente`= Documento_Cliente and `FK_Rol` = `ID_Rol`;

END;
