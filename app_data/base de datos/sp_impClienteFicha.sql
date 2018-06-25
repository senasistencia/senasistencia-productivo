#
# Procedure "sp_impClienteFicha"
#

DROP PROCEDURE IF EXISTS `sp_impClienteFicha`;
CREATE PROCEDURE `sp_impClienteFicha`()
BEGIN

SELECT `PrimerNombre_Cliente`,`SegundoNombre_Cliente`,`PrimerApellido_Cliente`,`SegundoApellido_Cliente`,`Num_Ficha` FROM cliente_ficha 
INNER JOIN cliente INNER JOIN ficha
ON `FK_DocCliente`= Documento_Cliente AND `FK_Ficha` = `ID_Ficha`;

END;
