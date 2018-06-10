#datos de la base de datos senasistencia


#
# Data for table "aprendiz"
#

INSERT INTO `aprendiz` 
(`FK_TipoDeDocumento`,`Documento_Aprendiz`,`PrimerNombre_Aprendiz`,`SegundoNombre_Aprendiz`,`PrimerApellido_Aprendiz`,`SegundoApellido_Aprendiz`,`Correo_Aprendiz`,`Telefono_Aprendiz`,`FK_Ficha`,`Estado_Aprendiz`,`FechaDeCreacion_Aprendiz`,`FechaDeInactivacion_Aprendiz`)
VALUES 
(3,52809251,'Johanna','Milena','Jamaica','Rojas','jmjamaica@misena.edu.co','3214049197',4,1,'2018-04-29',NULL),
(3,79966296,'Robert','Smith','Duque','Morales','rsmithd7@misena.edu.co','3014002169',3,1,'2018-04-29',NULL),
(2,80740814,'Harold','Andres','Pietro','Fernandez','haprieto41@misena.edu.co','3212141572',3,1,'2018-04-29',NULL),
(1,80807041,'Luis','Antonio','Forero','Torres','laforero1@misena.edu.co','3187809716',1,1,'2018-04-29',NULL),
(2,104001261,'Alma','Marcela','Silva','','almarsilva@misena.edu.co','3112843650',2,1,'2018-04-29',NULL),
(1,1018502967,'Deivis','Andres','Naranjo','Perez','danaranjo06@misena.edu.co','3103009547',2,1,'2018-04-29',NULL),
(2,1019120468,'Nataly','Stefania','Medina','Poveda','stefa142396@gmail.com','3134595081',2,1,'2018-04-29',NULL),
(1,1020800497,'Tatiana','','Paez','','ltpaez7@misena.edu.co','3224385002',1,1,'2018-04-29',NULL),
(1,1024587455,'Deisy','Johanna','Forero','','djforero08@misena.edu.co','3215487985',4,1,'2018-04-29',NULL),
(1,1073160640,'Orlando','','Echeverry','Velez','oecheverry0@misena.edu.co','3143326357',1,1,'2018-04-29',NULL),
(2,1457824552,'David','Stiwen','Rugeles','','dsrugeles5@misena.edu.co','3157254152',3,1,'2018-04-29',NULL);

#
# Data for table "asistencia"
#


#
# Data for table "cliente"
#

INSERT INTO `cliente` (`FK_TipoDeDocumento`,`Documento_Cliente`,`PrimerNombre_Cliente`,`SegundoNombre_Cliente`,`PrimerApellido_Cliente`,`SegundoApellido_Cliente`,`Correo_Cliente`,`Telefono_Cliente`,`FK_Perfil`,`Estado_Cliente`,`FechaDeCreacion_Cliente`,`FechaDeInactivacion_Cliente`) 
VALUES 
(1,45785425,'Lina','','Valderrama','Tovar','ltovar2@hotmail.com','3001548750',2,1,'2018-05-04',NULL),
(2,54875425,'Luisa','Maria','Pulido','Garzon','lmpulido548@outlook.com','3115489754',1,1,'2018-05-04',NULL),
(1,123456789,'Profe','Sor','Jirafales','','pjfales@gmail.com','3225487910',1,1,'2018-05-04',NULL),
(2,187548755,'Luis','Felipe','Rojas','Amezquita','luisf61@hotmail.com','3502124488',2,1,'2018-05-04',NULL),
(3,768745122,'Ivan','David','Mora','Morales','ivanmm@hotmail.com','3178897897',2,1,'2018-05-04',NULL),
(1,1578425455,'Carlos','Julio','Camargo','Cuellar','carlosc12@hotmail.com','3157854254',2,1,'2018-05-04',NULL),
(3,8954787542,'Diana','Marcela','Trujillo','Perdomo','Dmarcela89@gmail.com','3012548790',2,1,'2018-05-04',NULL),
(1,1023017475,'David','Stiwen','Rugeles','Cano','dsrugeles5@misena.edu.co','3214993188',1,1,'2018-06-09',NULL),
(1,1013633680,'Deisy','Johanna','Forero','Gonzalez','djforero08@misena.edu.co','3114682551',1,1,'2018-06-09',NULL);

#
# Data for table "cliente_ficha"
#

INSERT INTO `cliente_ficha` (`FK_DocCliente`,`FK_Ficha`) 
VALUES 
(123456789,5),
(1023017475,1),
(1013633680,1);

#
# Data for table "cliente_rol"
#

INSERT INTO `cliente_rol` (`FK_DocCliente`,`FK_Rol`) 
VALUES 
(123456789,2),
(1023017475,1),
(1013633680,1);
#
# Data for table "excusa"
#

INSERT INTO `excusa` (`ID_Excusa`,`FechaInicio_Excusa`,`FechaFin_Excusa`,`Comentario_Excusa`,`Url_Excusa`) 
VALUES 

(NULL,'2018-05-03','2018-05-31','aprendiz fallo por excusa medica',''),
(NULL,'2018-03-04','2018-05-31','aprendiz tiene 3 dias de incapacidad',''),
(NULL,'2018-03-05','2018-05-31','aprendiz  justifica 1 de sus 2 fallas',''),
(NULL,'2018-03-06','2018-05-31','aprendiz no cuenta con mas fallas',''),
(NULL,'2018-03-07','2018-05-31','aprendiz justifica 2 de sus 3 fallas',''),
(NULL,'2018-03-08','2018-05-31','aprendiz no justifica fallas','');

#
# Data for table "excusa_asistencia"
#

INSERT INTO `excusa_asistencia` (`FK_Excusa`,`FK_Asistencia`) VALUES (1,1);

#
# Data for table "ficha"
#

INSERT INTO `ficha` (`ID_Ficha`,`FK_Programa`,`Num_Ficha`,`Grupo_Ficha`,`Jornada_Ficha`,`Trimestre_Ficha`,`Estado_Ficha`,`FechaDeCreacion_Ficha`,`FechaDeInactivacion_Ficha`) 
VALUES 
(NULL,8,'1193334',1,'Diurna',7,1,'2018-04-29',NULL),
(NULL,1,'1193335',2,'Nocturna',2,1,'2018-04-29',NULL),
(NULL,4,'1193336',3,'Madrugada',4,1,'2018-04-29',NULL),
(NULL,7,'1193337',4,'Fines de Semana',3,1,'2018-04-29',NULL),
(NULL,9,'1193338',1,'Nocturna',10,1,'2018-04-29',NULL),
(NULL,10,'1184442',3,'Diurna',8,1,'2018-04-29',NULL),
(NULL,3,'1184443',2,'Fines de Semana',6,1,'2018-04-29',NULL),
(NULL,6,'1184444',1,'Diurna',5,1,'2018-04-29',NULL),
(NULL,1,'1184445',4,'Nocturna',2,1,'2018-04-29',NULL),
(NULL,2,'1184446',2,'Diurna',1,1,'2018-04-29',NULL);

#
# Data for table "notificacion"
#

INSERT INTO `notificacion` (`ID_Notificacion`,`Asunto_Notificacion`,`Mensaje_Notificacion`)
VALUES 
(NULL,'Desercion','Notificacion por inasistencia sin previo aviso; por tanto se espera que el aprendiz facilite formato de excusa lo mas pronto posible. NOTA: la tercer inasistencia sera causal de inhabilidad en el sistema; de no presentarse ninguna excusa el aprendiz sera remitido a comite con formato de desercion del programa de formacion.');

#
# Data for table "perfil"
#

INSERT INTO `perfil` (`ID_Perfil`,`Tipo_Perfil`,`Estado_Perfil`,`FechaDeCreacion_Perfil`,`FechaDeInactivacion_Perfil`) 
VALUES 
(NULL,'Instructor',1,'2018-05-05',NULL),
(NULL,'Psicologo',1,'2018-05-05',NULL),
(NULL,'Coordinador',1,'2018-05-05',NULL);

#
# Data for table "programa_formacion"
#

INSERT INTO `programa_formacion` (`ID_Programa`,`Nombre_Programa`,`Estado_Programa`,`FechaDeCreacion_Programa`,`FechaDeInactivacion_Programa`)
VALUES 
(NULL,'Mantenimiento de Motocicletas',1,'2018-04-29',NULL),
(NULL,'Analisis y Desarrollo de Sistemas de Informacion',1,'2018-04-29',NULL),
(NULL,'Apoyo Administrativo en Salud',1,'2018-04-29',NULL),
(NULL,'Asistencia Administrativa',1,'2018-04-29',NULL),
(NULL,'Asistencia en Organizacion de Archivos',1,'2018-04-29',NULL),
(NULL,'Inspeccion y Ensayos con Procesos no Destructivos',1,'2018-04-29',NULL),
(NULL,'Instalacion de Infraestructura para Redes Moviles',1,'2018-04-29',NULL),
(NULL,'Instalacion de Redes de Computadores',1,'2018-04-29',NULL),
(NULL,'Instalaciones de Redes Hibridas de Fibra Optica y Coaxial',1,'2018-04-29',NULL),
(NULL,'Diseño e Integracion de Multimedia',1,'2018-04-29',NULL),
(NULL,'Mantenimiento de Equipos Electronicos de Consumo Masivo',1,'2018-04-29',NULL);

#
# Data for table "registro_notificacion"
#


#
# Data for table "rol"
#

INSERT INTO `rol` (`ID_Rol`,`Tipo_Rol`,`Estado_Rol`,`FechaDeCreacion_Rol`,`FechaDeInactivacion_Rol`) 
VALUES 
(NULL,'Administrador',1,'2018-04-29',NULL),
(NULL,'Usuario',1,'2018-04-29',NULL);

#
# Data for table "tipo_de_documento"
#

INSERT INTO `tipo_de_documento` (`ID_TipoDeDocumento`,`Nombre_TipoDeDocumento`,`Estado_TipoDeDocumento`,`FechaDeCreacion_TipoDeDocumento`,`FechaDeInactivacion_TipoDeDocumento`)
VALUES 
(NULL,'Cedula de Ciudadania',1,'2018-04-29',NULL),
(NULL,'Tarjeta de Identidad',1,'2018-04-29',NULL),
(NULL,'Cedula de Extranjeria',1,'2018-04-29',NULL);

#
# Data for table "usuario"
#

INSERT INTO `usuario` (`ID_Usuario`,`FK_DocCliente`,`Password_Hash`,`Estado_Usuario`,`FechaDeCreacion_Usuario`,`FechaDeInactivacion_Usuario`) 
VALUES 
(NULL,123456789,SHA1('1234'),1,'2018-05-04',NULL),
(NULL,1023017475,SHA1('perras'),1,'2018-06-09',NULL),
(NULL,1013633680,SHA1('admin123'),1,'2018-06-09',NULL);
