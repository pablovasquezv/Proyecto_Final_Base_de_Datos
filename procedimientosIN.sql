/*1-Crear un procedimiento que inserte un alumno en la tabla de alumnos.*/
CREATE OR REPLACE PROCEDURE nuevo_alumno 
(
    ALUMNOS   IN   NUMBER,
    APODERADO   IN   NUMBER,
    RUT   IN   NUMBER,
    NOMBRES    IN VARCHAR2,
    APELLIDO_PATERNO   IN VARCHAR2,
    APELLIDO_MATERNO  IN  VARCHAR2,
    FECHA_NACIMIENTO   IN  DATE,
    SEXO    IN  VARCHAR2,
    CALLE   IN VARCHAR2,
    NUMERO IN   NUMBER,
    CIUDAD IN VARCHAR2 
) IS
--Creamos una variable 
    total NUMBER;
    
BEGIN
    total := 0;
    SELECT
        COUNT(*)
    INTO total
    FROM
        alumnos
    WHERE
       ID_ALUMNOS = ALUMNOS;
    --CREAMO UN CICLO IF PARA VERIFICAR SI EL PRODUCTO EXISTE
    IF total = 0 THEN
    
    
        INSERT INTO alumnos VALUES (
            
    ALUMNOS,
    APODERADO,
    RUT ,
    NOMBRES,
    APELLIDO_PATERNO,
    APELLIDO_MATERNO,
    FECHA_NACIMIENTO,
    SEXO,
    CALLE,
    NUMERO,
    CIUDAD 
);
END IF;
END;


/*LLAMADA A LA FUNCIÓN DESDE UN BLOQUE ANONIMO*/
BEGIN
 nuevo_alumno(4, 1,176, 'emanuel', 'rubilar','curinao','12-12-2007','M','nose',4345,'santiago');
    nuevo_alumno(5, 1,123, 'judith', 'curinao','curinao','12-12-1999','F','nose',4345,'temuco');

END;

SELECT
  *
FROM
    alumnos;
    
    
/*1-Crear un procedimiento que inserte un DEPARTAMENTO en la tabla de DEPARTAMENTOS.*/
CREATE OR REPLACE PROCEDURE nuevo_departamentos (
   DEPARTAMENTO  IN   NUMBER,
   NOMBRE   IN   VARCHAR2
  
) IS
--Creamos una variable 
    total NUMBER;
BEGIN
    total := 0;
    SELECT
        COUNT(*)
    INTO total
    FROM
        departamentos
    WHERE
        D_DEPARTAMENTO = DEPARTAMENTO;
        
    --CREAMO UN CICLO IF PARA VERIFICAR SI EL departamento EXISTE

    IF total = 0 THEN
        INSERT INTO departamentos VALUES (
           DEPARTAMENTO,
           NOMBRE
        );

END IF;

END;
    
    /*LLAMADA A LA FUNCIÓN DESDE UN BLOQUE ANONIMO*/
 BEGIN
   nuevo_departamentos(2,'HISTORIA');
   nuevo_departamentos(3,'EDUCACION FISICA');
 
END;

SELECT
  *
FROM
departamentos;


--Procedimientos Asignaturas
CREATE OR REPLACE PROCEDURE nuevo_asignatura (

   ASIGNATURAS  IN   NUMBER,
   CODIGO_PROFESOR  IN   NUMBER,
   SEMESTRES  IN   NUMBER,
   NOMBRE IN   VARCHAR2,
   CANTIDAD_HORAS IN NUMBER
  
) IS
--Creamos una variable 
    total NUMBER;
BEGIN
    total := 0;
    SELECT
        COUNT(*)
    INTO total
    FROM
        asignaturas
    WHERE
        ID_ASIGNATURAS =ASIGNATURAS;
        
--CREAMO UN CICLO IF PARA VERIFICAR SI EL departamento EXISTE

    IF total = 0 THEN
        INSERT INTO asignaturas VALUES (
           ASIGNATURAS,
           CODIGO_PROFESOR,
           SEMESTRES ,
           NOMBRE,
           CANTIDAD_HORAS
        );
END IF;
END;

 /*LLAMADA A LA FUNCIÓN DESDE UN BLOQUE ANONIMO*/
 BEGIN
   nuevo_asignatura(3,1, 'TECNOLOGIA',1,1);
   nuevo_asignatura(4,1, 'ED FISICA',2,1);
 
END;
--consulta
SELECT * FROM  asignaturas;

--PROCEDIMIENTO PROFESORES
CREATE OR REPLACE PROCEDURE nuevo_profesor
(
    PROFESOR IN NUMBER,
    DEPARTAMENTO IN NUMBER,
    RUT IN NUMBER ,
    NOMBRES IN VARCHAR,
    APELLIDO_PATERNO IN VARCHAR,
    APELLIDO_MATERNO IN VARCHAR,
    FECHA_NACIMIENTO IN VARCHAR,
    SEXO IN VARCHAR,
    CELULAR IN VARCHAR2,
    CALLE   IN VARCHAR2,
    NUMERO IN   NUMBER,
    CIUDAD IN VARCHAR2 
) IS
--Creamos una variable 
    total NUMBER;
    
BEGIN
    total := 0;
    SELECT
        COUNT(*)
    INTO total
    FROM
        profesores
    WHERE
       ID_PROFESOR = profesor;
    --CREAMO UN CICLO IF PARA VERIFICAR SI EL PROFESOR EXISTE
    IF total = 0 THEN
    
    
        INSERT INTO profesores VALUES (
            
    PROFESOR,
    DEPARTAMENTO,
    RUT,
    NOMBRES,
    APELLIDO_PATERNO,
    APELLIDO_MATERNO,
    FECHA_NACIMIENTO,
    SEXO,
    CELULAR,
    CALLE  ,
    NUMERO ,
    CIUDAD  
);
END IF;
END;


/*LLAMADA A LA FUNCIÓN DESDE UN BLOQUE ANONIMO*/
BEGIN
nuevo_profesor(4, 1,17621, 'emanuel', 'rubilar','curinao','12-12-2007','M','nose','',4345,'santiago');

END;

SELECT
  *
FROM
    profesores;


