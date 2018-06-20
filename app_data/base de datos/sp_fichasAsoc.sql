# Host: 127.0.0.1  (Version 5.5.5-10.1.22-MariaDB)
# Date: 2018-06-17 23:21:42
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Procedure "sp_fichasAsoc"
#

DROP PROCEDURE IF EXISTS `sp_fichasAsoc`;
CREATE PROCEDURE `sp_fichasAsoc`(IN _documento BIGINT(16))
BEGIN

SELECT ID_Ficha,Nombre_Programa as Programa ,Num_Ficha,Grupo_Ficha FROM ficha INNER JOIN cliente_ficha INNER JOIN cliente INNER JOIN programa_formacion
ON ficha.ID_Ficha = cliente_ficha.FK_Ficha AND cliente.Documento_Cliente = cliente_ficha.FK_DocCliente AND programa_formacion.ID_Programa = ficha.FK_Programa WHERE cliente.Documento_Cliente = _documento;

END;
