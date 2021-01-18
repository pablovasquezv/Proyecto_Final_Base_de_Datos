
create or replace TRIGGER insercion_alumno AFTER
    INSERT ON ALUMNOS
    FOR EACH ROW
DECLARE
   --DECLARAMOS DOS VARIABLE UNA PARA EL USUARIO Y OTRA PARA LA FECHA DEL REGISTRO
   --GUARDAMOS EL USUARIOS QUE INSERTO DATOS 
    v_username   VARCHAR2(50);
    --GUARDAMOS LA FECHA DE INGRESO
    v_fecha      DATE;
BEGIN
    --CREAMOS UN SELECT PARA OBTENER EL NOMBRE DEL USUARIO DE LA TABLA DUAL DEL SISTEMA ORACLE
    SELECT
        user
    INTO v_username

    FROM
        dual;

    --CREAMOS UN SELECT PARA OBTENER LA FECHA DE INSERCIÃ“N DESDE EL SISTEMA

    SELECT
        SYSDATE
    INTO v_fecha
    FROM
        dual;
    --INSERTAMOS DATOS AL SER LLAMOs EL TRIGGER
    

    INSERT INTO INSERCION_ALUMNOS (
        a_id_alumnos,
        a_codigo_apoderado,
        a_rut,
        a_nombres,
        a_apellido_paterno,
        a_apellido_materno,
        a_fecha_nacimiento,
        a_sexo,
        a_calle,
        a_numero,
        a_ciudad,
        fecha,
        usuario
    ) VALUES (
        'CODIGO: ' || :new.id_alumno,
        'CODIGO: ' || :new.codigo_apoderado,
        'RUT: ' || :new.rut,
        'NOMBRE: ' || :new.nombres,
        'APELLIDO P: ' || :new.apellido_paterno,
        'APELLIDO M: ' || :new.apellido_materno,
        'FECHA N: ' || :new.fecha_nacimiento,
        'SEXO: ' || :new.sexo,
        'CALLE: ' || :new.calle,
        'NUMERO: ' || :new.numero,
        'CIUDAD: ' || :new.ciudad,
        v_fecha,
        v_username
    );
END;

/*Creamos la tabla donde se guardaran los datos capturados por los Triggers*/
CREATE TABLE insercion_alumnos (
    A_id_alumnos         VARCHAR2(90),
    A_codigo_apoderado   VARCHAR2(90),
    A_rut                VARCHAR2(90),
    A_nombres            VARCHAR2(90),
    A_apellido_paterno   VARCHAR2(90),
    A_apellido_materno   VARCHAR2(90),
    A_fecha_nacimiento   VARCHAR2(90),
    A_sexo               VARCHAR2(90),
    A_calle              VARCHAR2(150),
    A_numero             VARCHAR2(90),
    A_ciudad             VARCHAR2(90),
    fecha                DATE,
    usuario              VARCHAR2(50)
);
