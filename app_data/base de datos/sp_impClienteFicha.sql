# Host: 127.0.0.1  (Version 5.5.5-10.1.22-MariaDB)
# Date: 2018-06-17 23:22:01
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Procedure "sp_impClienteFicha"
#

DROP PROCEDURE IF EXISTS `sp_impClienteFicha`;
CREATE PROCEDURE `sp_impClienteFicha`()
BEGIN
SELECT `PrimerNombre_Cliente`,SegundoNombre_Cliente,PrimerApellido_Cliente,SegundoApellido_Cliente,`Num_Ficha` FROM cliente_ficha 
inner join cliente inner join ficha
on `FK_DocCliente`= Documento_Cliente and `FK_Ficha` = `ID_Ficha`;
END;
