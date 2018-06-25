#
# Procedure "sp_listadoA"
#
DROP PROCEDURE IF EXISTS `sp_listadoA`;
CREATE PROCEDURE `sp_listadoA`(IN _idFicha BIGINT(16))
BEGIN

SELECT PrimerNombre_Aprendiz,PrimerApellido_Aprendiz FROM aprendiz
WHERE Estado_aprendiz = 1 AND FK_Ficha = _idFicha;

END;