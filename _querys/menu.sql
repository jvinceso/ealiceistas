select * from aplicaciones;
select * from objeto;
select * from objeto_detalle;
select * from usuario_objeto;
select * from empleo_ofrecido;
Necesito contador colegiado paraa empresa exportadora de productos agricolas.
SELECT * FROM aplicaciones WHERE cAplEstado='1';

SELECT * FROM OBJETO WHERE nObjId=1 AND cObjEstado=1;

INSERT INTO `bd_aeal`.`objeto_detalle`
(`nObjId`,`cOdetNombreArchivo`,`nOdetTipo`,`cOdetPlataforma`,`cOdetEstado`)
VALUES
(1,'../comunicados/bandejap','1','W','1' ),
(2,'../publicidad/bandejap','1','W','1' ),
(3,'../exalumnos/bandejap','1','W','1' ),
(4,'../empleos/bandejap','1','W','1' ),
(5,'../servicios/bandejap','1','W','1' ),
(6,'../promociones/bandejap','1','W','1' ),
(7,'../eventos/bandejap','1','W','1' ),
(8,'../onomasticos/bandejap','1','W','1' );
