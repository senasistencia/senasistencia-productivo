CREATE DATABASE senasistencia;
USE senasistencia;

#
# Structure for table "aprendiz"
#

DROP TABLE IF EXISTS `aprendiz`;
CREATE TABLE `aprendiz` (
  `FK_TipoDeDocumento` bigint(16) NOT NULL COMMENT 'Este ID corresponde al campo ID_TipoDeDocumento de la tabla Tipo de documento',
  `Documento_Aprendiz` bigint(16) NOT NULL COMMENT 'Numero de documento del APRENDIZ.',
  `PrimerNombre_Aprendiz` varchar(60) NOT NULL COMMENT 'Primer nombre del APRENDIZ.',
  `SegundoNombre_Aprendiz` varchar(60) DEFAULT NULL COMMENT 'Segundo nombre del APRENDIZ.',
  `PrimerApellido_Aprendiz` varchar(60) NOT NULL COMMENT 'Primer apellido del APRENDIZ.',
  `SegundoApellido_Aprendiz` varchar(60) DEFAULT NULL COMMENT 'Segundo apellido del APRENDIZ.',
  `Correo_Aprendiz` varchar(60) NOT NULL COMMENT 'Correo del APRENDIZ.',
  `Telefono_Aprendiz` varchar(10) DEFAULT NULL COMMENT 'Numero telefonico del aprendiz.',
  `FK_Ficha` bigint(16) NOT NULL COMMENT 'Este ID corresponde al campo ID_FICHA de la tabla FICHA.',
  `Estado_Aprendiz` tinyint(1) NOT NULL COMMENT 'Indica si el registro esta Activo o Inactivo.',
  `FechaDeCreacion_Aprendiz` date NOT NULL COMMENT 'Fecha de Creacion del APRENDIZ en el sistema.',
  `FechaDeInactivacion_Aprendiz` date DEFAULT NULL COMMENT 'Fecha de Inactivacion del APRENDIZ en el sistema.',
  PRIMARY KEY (`Documento_Aprendiz`),
  KEY `fk_aprendiz_tipo_de_documento1_idx` (`FK_TipoDeDocumento`),
  KEY `fk_aprendiz_ficha1_idx` (`FK_Ficha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "asistencia"
#

DROP TABLE IF EXISTS `asistencia`;
CREATE TABLE `asistencia` (
  `ID_Asistencia` bigint(16) NOT NULL AUTO_INCREMENT COMMENT 'Este ID se genera cada vez que se ingresa un registro nuevo referente a los datos del ASISTENCIA.',
  `FK_DocAprendiz` bigint(16) NOT NULL COMMENT 'Numero de documento del APRENDIZ.',
  `Estado_Asistencia` tinyint(1) NOT NULL COMMENT 'Registro de la asistencia del aprendiz ((1-Asistio),(0-falla) o (2-excusa)',
  `Fecha_Asistencia` date NOT NULL COMMENT 'Fecha del registro de la asistencia',
  PRIMARY KEY (`ID_Asistencia`),
  KEY `fk_asistencia_aprendiz1_idx` (`FK_DocAprendiz`)
) ENGINE=InnoDB AUTO_INCREMENT= 0 DEFAULT CHARSET=utf8;

#
# Structure for table "cliente"
#

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `FK_TipoDeDocumento` bigint(16) NOT NULL COMMENT 'Este ID corresponde al campo ID_TipoDeDocumento de la tabla tipo de documento.',
  `Documento_Cliente` bigint(16) NOT NULL COMMENT 'Numero de documento del CLIENTE.',
  `PrimerNombre_Cliente` varchar(60) NOT NULL COMMENT 'Primer nombre del CLIENTE.',
  `SegundoNombre_Cliente` varchar(60) DEFAULT NULL COMMENT 'Segundo nombre del CLIENTE.',
  `PrimerApellido_Cliente` varchar(60) NOT NULL COMMENT 'Primer apellido del CLIENTE.',
  `SegundoApellido_Cliente` varchar(60) DEFAULT NULL COMMENT 'Segundo apellido del CLIENTE.',
  `Correo_Cliente` varchar(60) NOT NULL COMMENT 'Correo del CLIENTE.',
  `Telefono_Cliente` varchar(10) DEFAULT NULL COMMENT 'Numero de telefono del CLIENTE.',
  `FK_Perfil` bigint(16) NOT NULL COMMENT 'Este ID corresponde al campo ID_Perfil de la tabla perfil',
  `Estado_Cliente` tinyint(1) NOT NULL COMMENT 'Indica si el registro esta Activo o Inactivo.',
  `FechaDeCreacion_Cliente` date NOT NULL COMMENT 'Fecha de creacion del cliente en el sistema.',
  `FechaDeInactivacion_Cliente` date DEFAULT NULL COMMENT 'Fecha de la inactivacion del CLIENTE.',
  PRIMARY KEY (`Documento_Cliente`),
  KEY `fk_cliente_tipo_de_documento1_idx` (`FK_TipoDeDocumento`),
  KEY `fk_cliente_perfil1_idx` (`FK_Perfil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "cliente_ficha"
#

DROP TABLE IF EXISTS `cliente_ficha`;
CREATE TABLE `cliente_ficha` (
  `FK_DocCliente` bigint(16) NOT NULL COMMENT 'Numero de documento del CLIENTE.',
  `FK_Ficha` bigint(16) NOT NULL COMMENT 'Este ID corresponde al campo ID_Ficha de la tabla FICHA.',
  KEY `fk_cliente_has_ficha_ficha1_idx` (`FK_Ficha`),
  KEY `fk_cliente_has_ficha_cliente1_idx` (`FK_DocCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "cliente_rol"
#

DROP TABLE IF EXISTS `cliente_rol`;
CREATE TABLE `cliente_rol` (
  `FK_DocCliente` bigint(16) NOT NULL COMMENT 'Numero de documento del CLIENTE.',
  `FK_Rol` bigint(16) NOT NULL COMMENT 'Este ID corresponde al ID_Rol de la tabla ROL.',
  KEY `fk_cliente_has_rol_rol1_idx` (`FK_Rol`),
  KEY `fk_cliente_has_rol_cliente1_idx` (`FK_DocCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "excusa"
#

DROP TABLE IF EXISTS `excusa`;
CREATE TABLE `excusa` (
  `ID_Excusa` bigint(16) NOT NULL AUTO_INCREMENT COMMENT 'Este ID se genera cada vez que se ingresa un registro nuevo referente a los datos del EXCUSA.',
  `FechaInicio_Excusa` date NOT NULL COMMENT 'Fecha en la cual inicia la EXCUSA.',
  `FechaFin_Excusa` date NOT NULL COMMENT 'Fecha fin de la excusa',
  `Comentario_Excusa` varchar(600) NOT NULL COMMENT 'Comentarios al respecto sobre la excusa.',
  `Url_Excusa` varchar(500) DEFAULT NULL COMMENT 'Ruta del servidor donde se va a guardar el archivo o los archivos de la excusa.',
  PRIMARY KEY (`ID_Excusa`)
) ENGINE=InnoDB AUTO_INCREMENT= 0 DEFAULT CHARSET=utf8;

#
# Structure for table "excusa_asistencia"
#

DROP TABLE IF EXISTS `excusa_asistencia`;
CREATE TABLE `excusa_asistencia` (
  `FK_Excusa` bigint(16) NOT NULL COMMENT 'Este ID corresponde al campo ID_Excusa de la tabla EXCUSA.',
  `FK_Asistencia` bigint(16) NOT NULL COMMENT 'Este ID corresponde al campo ID_Asistencia de la tabla ASISTENCIA.',
  KEY `fk_excusa_has_asistencia_asistencia1_idx` (`FK_Asistencia`),
  KEY `fk_excusa_has_asistencia_excusa1_idx` (`FK_Excusa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Structure for table "ficha"
#

DROP TABLE IF EXISTS `ficha`;
CREATE TABLE `ficha` (
  `ID_Ficha` bigint(16) NOT NULL AUTO_INCREMENT COMMENT 'Este ID se genera cada vez que se ingresa un registro nuevo referente a los datos de la FICHA.',
  `FK_Programa` bigint(10) NOT NULL COMMENT 'Este ID corresponde al campo ID_PROGRAMA de la tabla Programa_Formacion.',
  `Num_Ficha` varchar(20) NOT NULL COMMENT 'Numero con el cual se identifica la FICHA.',
  `Grupo_Ficha` int(11) NOT NULL COMMENT 'Este campo se realiza con el fin de mostrar el numero de grupo al cual pertenece la ficha.',
  `Jornada_Ficha` varchar(15) NOT NULL COMMENT 'Este campo se realiza con el fin de mostrar la jornada a la cual pertenece la ficha.',
  `Trimestre_Ficha` int(11) NOT NULL COMMENT 'Este campo se realiza con el fin de mostrar el trimestre en el cual se encuentra la ficha.',
  `Estado_Ficha` tinyint(1) NOT NULL COMMENT 'Indica si el registro esta Activo o Inactivo.',
  `FechaDeCreacion_Ficha` date NOT NULL COMMENT 'Fecha de Creacion de la FICHA en el sistema.',
  `FechaDeInactivacion_Ficha` date DEFAULT NULL COMMENT 'Fecha de Inactivacion de la FICHA en el sistema.',
  PRIMARY KEY (`ID_Ficha`),
  KEY `fk_ficha_programa_formacion1_idx` (`FK_Programa`)
) ENGINE=InnoDB AUTO_INCREMENT= 0 DEFAULT CHARSET=utf8;

#
# Structure for table "notificacion"
#

DROP TABLE IF EXISTS `notificacion`;
CREATE TABLE `notificacion` (
  `ID_Notificacion` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Este ID se genera cada vez que se ingresa un registro nuevo referente a los datos de la notificacion.',
  `Asunto_Notificacion` varchar(100) NOT NULL COMMENT 'Este campo contendra el ASUNTO que llevara la notificacion.',
  `Mensaje_Notificacion` varchar(3000) NOT NULL COMMENT 'Este campo contendra el CUERPO DEL MENSAJE de la notificacion.',
  PRIMARY KEY (`ID_Notificacion`)
) ENGINE=InnoDB AUTO_INCREMENT= 0 DEFAULT CHARSET=utf8;

#
# Structure for table "perfil"
#

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE `perfil` (
  `ID_Perfil` bigint(16) NOT NULL AUTO_INCREMENT COMMENT 'Este ID se genera cada vez que se ingresa un registro nuevo referente a los datos del PERFIL.',
  `Tipo_Perfil` varchar(40) NOT NULL COMMENT 'Cargo que ejerce.',
  `Estado_Perfil` tinyint(1) NOT NULL COMMENT 'Indica si el registro esta Activo o Inactivo.',
  `FechaDeCreacion_Perfil` date NOT NULL COMMENT 'Fecha de la Creacion del Perfil en el sistema',
  `FechaDeInactivacion_Perfil` date DEFAULT NULL COMMENT 'Fecha de Inactivacion del Perfil en el sistema',
  PRIMARY KEY (`ID_Perfil`)
) ENGINE=InnoDB AUTO_INCREMENT= 0 DEFAULT CHARSET=utf8;

#
# Structure for table "programa_formacion"
#

DROP TABLE IF EXISTS `programa_formacion`;
CREATE TABLE `programa_formacion` (
  `ID_Programa` bigint(10) NOT NULL AUTO_INCREMENT COMMENT 'Este ID se genera cada vez que se ingresa un registro nuevo referente a los datos del PROGRAMA DE FORMACION.',
  `Nombre_Programa` varchar(100) NOT NULL COMMENT 'Nombre del PROGRAMA DE FORMACION.',
  `Estado_Programa` tinyint(1) NOT NULL COMMENT 'Indica si el registro esta Activo o Inactivo.',
  `FechaDeCreacion_Programa` date NOT NULL COMMENT 'Fecha de creacion del Programa de formacion en el sistema\n',
  `FechaDeInactivacion_Programa` date DEFAULT NULL COMMENT 'Fecha de inactivacion del Programa de formacion en el sistema',
  PRIMARY KEY (`ID_Programa`)
) ENGINE=InnoDB AUTO_INCREMENT= 0 DEFAULT CHARSET=utf8;

#
# Structure for table "registro_notificacion"
#

DROP TABLE IF EXISTS `registro_notificacion`;
CREATE TABLE `registro_notificacion` (
  `ID_Registro` bigint(16) NOT NULL AUTO_INCREMENT COMMENT 'Este ID se genera cada vez que se ingresa un registro nuevo referente a los datos de la NOTIFICACION.',
  `Fecha_Registro` date NOT NULL COMMENT 'Este campo contendra la FECHA DE ENVIO de la notificacion.',
  `FK_DocAprendiz` bigint(16) NOT NULL,
  `FK_Asistencia` bigint(16) NOT NULL COMMENT 'Este ID corresponde al campo ID_Asistencia de la tabla ASISTENCIA .',
  `FK_DocCliente` bigint(16) NOT NULL COMMENT 'Numero de documento del CLIENTE.',
  `FK_Notificacion` int(11) NOT NULL,
  PRIMARY KEY (`ID_Registro`),
  KEY `fk_notificacion_asistencia1_idx` (`FK_Asistencia`),
  KEY `fk_registro_notificacion_cliente1_idx` (`FK_DocCliente`),
  KEY `fk_registro_notificacion_notificacion1_idx` (`FK_Notificacion`),
  KEY `fk_registro_notificacion_aprendiz1_idx` (`FK_DocAprendiz`)
) ENGINE=InnoDB AUTO_INCREMENT= 0 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

#
# Structure for table "rol"
#

DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `ID_Rol` bigint(16) NOT NULL AUTO_INCREMENT COMMENT 'Este ID se genera cada vez que se ingresa un registro nuevo referente a los datos del ROL.',
  `Tipo_Rol` varchar(30) NOT NULL COMMENT 'ROL para asignacion de permisos en el SOFTWARE.(administrador y usuario).',
  `Estado_Rol` tinyint(1) NOT NULL COMMENT ' Indica si el registro esta Activo o Inactivo.',
  `FechaDeCreacion_Rol` date NOT NULL COMMENT 'Fecha de creacion del Rol en el sistema',
  `FechaDeInactivacion_Rol` date DEFAULT NULL COMMENT 'Fecha de inactivacion del Rol en el sistema',
  PRIMARY KEY (`ID_Rol`)
) ENGINE=InnoDB AUTO_INCREMENT= 0 DEFAULT CHARSET=utf8;

#
# Structure for table "tipo_de_documento"
#

DROP TABLE IF EXISTS `tipo_de_documento`;
CREATE TABLE `tipo_de_documento` (
  `ID_TipoDeDocumento` bigint(16) NOT NULL AUTO_INCREMENT COMMENT 'Este ID se genera cada vez que se ingresa un registro nuevo referente a los datos del TIPO DEL DOCUMENTO.',
  `Nombre_TipoDeDocumento` varchar(50) NOT NULL COMMENT 'Nombre del Tipo de documento (Cedula de ciudadania,Targeta de identidad o cedula extranjera)',
  `Estado_TipoDeDocumento` tinyint(1) NOT NULL COMMENT 'Indica si el registro esta Activo o Inactivo.',
  `FechaDeCreacion_TipoDeDocumento` date NOT NULL COMMENT 'Fecha de creacion del TIPO DE DOCUMENTO.',
  `FechaDeInactivacion_TipoDeDocumento` date DEFAULT NULL COMMENT 'Fecha de la inactivacion del TIPO DE DOCUMENTO.',
  PRIMARY KEY (`ID_TipoDeDocumento`)
) ENGINE=InnoDB AUTO_INCREMENT= 0 DEFAULT CHARSET=utf8;

#
# Structure for table "usuario"
#

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `ID_Usuario` bigint(16) NOT NULL AUTO_INCREMENT COMMENT 'Este ID se genera cada vez que se ingresa un registro nuevo referente a los datos del USUARIO.\n',
  `FK_DocCliente` bigint(16) NOT NULL COMMENT 'Documento del CLIENTE.',
  `Password_Hash` varchar(100) NOT NULL COMMENT 'Password que se asigna a la persona al momento del registro.',
  `Estado_Usuario` tinyint(1) NOT NULL COMMENT 'Indica si el registro esta Activo o Inactivo.',
  `FechaDeCreacion_Usuario` date NOT NULL COMMENT 'Fecha de creacion del Usuario en el sistema',
  `FechaDeInactivacion_Usuario` date DEFAULT NULL COMMENT 'Fecha de inactivacion del Usuario en el sistema',
  PRIMARY KEY (`ID_Usuario`),
  KEY `fk_usuarios_cliente1_idx` (`FK_DocCliente`)
) ENGINE=InnoDB AUTO_INCREMENT= 0 DEFAULT CHARSET=utf8;
