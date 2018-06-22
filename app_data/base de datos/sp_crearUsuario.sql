#
# Procedure "sp_crearUsuario"
#

DROP PROCEDURE IF EXISTS `sp_crearUsuario`;
CREATE PROCEDURE `sp_crearUsuario`(IN _documento BIGINT(16),IN _pass VARCHAR(30))
BEGIN

INSERT INTO usuario VALUES (Null,_documento,SHA1(_pass),1,CURDATE(),NULL);

END;
