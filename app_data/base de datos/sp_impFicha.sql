# Host: 127.0.0.1  (Version 5.5.5-10.1.22-MariaDB)
# Date: 2018-06-17 23:22:24
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Procedure "sp_impFicha"
#

DROP PROCEDURE IF EXISTS `sp_impFicha`;
CREATE PROCEDURE `sp_impFicha`()
BEGIN

SELECT ID_Ficha,Nombre_Programa,Num_Ficha, Grupo_Ficha, Jornada_Ficha, Trimestre_Ficha, Estado_Ficha, FechaDeCreacion_Ficha, FechaDeInactivacion_Ficha FROM 
ficha inner join programa_formacion 
on FK_Programa= ID_Programa;

END;
