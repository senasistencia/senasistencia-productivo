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
