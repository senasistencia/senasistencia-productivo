# Host: 127.0.0.1  (Version 5.5.5-10.1.22-MariaDB)
# Date: 2018-06-25 03:33:06
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Procedure "sp_Actcontrasena"
#

DROP PROCEDURE IF EXISTS `sp_Actcontrasena`;
CREATE PROCEDURE `sp_Actcontrasena`(IN _documento BIGINT(16),IN _pass VARCHAR(100))
BEGIN
UPDATE usuario SET Password_Hash = SHA1(_pass) WHERE _documento;
END;
