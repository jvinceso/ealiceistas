INSERT INTO persona (nUbiId, cPerApellidoPaterno, cPerApellidoMaterno, cPerNombres, cPerEstado,cPerRandom)
 VALUES             (1,       'Castro', 'Aurora', 'Diego Armando', '0', NULL);
-- -------------------------------------------------------------------------
INSERT USUARIO(nPerId,cUsuNick,cUsuClave,nUsuTipo,cUsuEstado)
VALUES (1,'yamasaky','marvel',1,'0');
-- ----------------------------------------------------------------------
INSERT  APLICACIONES(cAplDescripcion,cAplImagenUrl,cAplEstado)
VALUES ('INFORMACION PUBLICA','','1');
INSERT  APLICACIONES(cAplDescripcion,cAplImagenUrl,cAplEstado)
VALUES ('ASOCIADOS','','1');
INSERT  APLICACIONES(cAplDescripcion,cAplImagenUrl,cAplEstado)
VALUES ('BOLSA DE TRABAJO','','1');
INSERT  APLICACIONES(cAplDescripcion,cAplImagenUrl,cAplEstado)
VALUES ('INFORMACION EX-ALUMNOS','','1');
-- ---------------------------------------------------------------------
INSERT objeto(nAplId,cObjNombre,cObjNombreArchivo,bObjTipo,nObjIdPadre,cObjEstado) 
VALUES(1,'COMUNICADOS','','','',1);
INSERT objeto(nAplId,cObjNombre,cObjNombreArchivo,bObjTipo,nObjIdPadre,cObjEstado) 
VALUES(1,'PUBLICIDAD','','','',1);
INSERT objeto(nAplId,cObjNombre,cObjNombreArchivo,bObjTipo,nObjIdPadre,cObjEstado) 
VALUES(2,'DIRECTIVA','','','',1);
INSERT objeto(nAplId,cObjNombre,cObjNombreArchivo,bObjTipo,nObjIdPadre,cObjEstado) 
VALUES(2,'EX-ALUMNOS','','','',1);
INSERT objeto(nAplId,cObjNombre,cObjNombreArchivo,bObjTipo,nObjIdPadre,cObjEstado) 
VALUES(3,'EMPLEOS OFRECIDOS','','','',1);
INSERT objeto(nAplId,cObjNombre,cObjNombreArchivo,bObjTipo,nObjIdPadre,cObjEstado) 
VALUES(3,'SERVICIOS PROFESIONALES','','','',1);
INSERT objeto(nAplId,cObjNombre,cObjNombreArchivo,bObjTipo,nObjIdPadre,cObjEstado) 
VALUES(4,'PROMOCIONES','','','',1);
INSERT objeto(nAplId,cObjNombre,cObjNombreArchivo,bObjTipo,nObjIdPadre,cObjEstado) 
VALUES(4,'EVENTOS','','','',1);
INSERT objeto(nAplId,cObjNombre,cObjNombreArchivo,bObjTipo,nObjIdPadre,cObjEstado) 
VALUES(4,'ONOMASTICOS','','','',1);