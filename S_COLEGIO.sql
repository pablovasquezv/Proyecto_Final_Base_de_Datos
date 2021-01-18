/*SCRIPT PARA LA CREACION DE LA TABLA ALUMNOS*/
CREATE TABLE alumnos (
    id_alumnos         INTEGER NOT NULL,
    codigo_apoderado   INTEGER NOT NULL,
    rut                INTEGER,
    nombres            VARCHAR2(50),
    apellido_paterno   VARCHAR2(50),
    apellido_materno   VARCHAR2(50),
    fecha_nacimiento   DATE,
    sexo               VARCHAR2(20),
    calle              VARCHAR2(90),
    numero             INTEGER,
    ciudad             VARCHAR2(20)
);

ALTER TABLE alumnos ADD CONSTRAINT alumnos_pk PRIMARY KEY ( id_alumnos );

/*SCRIPT PARA LA CREACION DE LA TABLA APODERADOS*/
CREATE TABLE apoderados (
    id_apoderado       INTEGER NOT NULL,
    rut                INTEGER,
    nombres            VARCHAR2(50),
    apellido_paterno   VARCHAR2(50),
    apellido_materno   VARCHAR2(50),
    sexo               VARCHAR2(20),
    celular            VARCHAR2(13),
    fecha_nacimiento   DATE,
    calle              VARCHAR2(100),
    numero             INTEGER,
    ciudad             VARCHAR2(20)
);

ALTER TABLE apoderados ADD CONSTRAINT apoderado_pk PRIMARY KEY ( id_apoderado );

/*SCRIPT PARA LA CREACION DE LA TABLA ASIGNATURAS*/
CREATE TABLE asignaturas (
    id_asignatura     INTEGER NOT NULL,
    codigo_curso      INTEGER NOT NULL,
    codigo_semestre   INTEGER NOT NULL,
    codigo_profesor   INTEGER NOT NULL,
    codigo_horario    INTEGER NOT NULL,
    nombre            VARCHAR2(50),
    cantidad_horas    INTEGER
);

ALTER TABLE asignaturas ADD CONSTRAINT asignaturas_pk PRIMARY KEY ( id_asignatura );

/*SCRIPT PARA LA CREACION DE LA TABLA ASISTENCIAS*/
CREATE TABLE asistencias (
    id_asistencias      INTEGER NOT NULL,
    codigo_curso        INTEGER NOT NULL,
    codigo_asignatura   INTEGER NOT NULL,
    codigo_alumno       INTEGER NOT NULL,
    fecha               DATE
);

ALTER TABLE asistencias ADD CONSTRAINT asistencias_pk PRIMARY KEY ( id_asistencias );

/*SCRIPT PARA LA CREACION DE LA TABLA CURSOS*/
CREATE TABLE cursos (
    id_curso            INTEGER NOT NULL,
    codigo_sala         INTEGER NOT NULL,
    codigo_matriculas   INTEGER NOT NULL,
    codigo_alumno       INTEGER NOT NULL,
    nombre              VARCHAR2(50)
);

ALTER TABLE cursos ADD CONSTRAINT curso_pk PRIMARY KEY ( id_curso );

/*SCRIPT PARA LA CREACION DE LA TABLA DEPARTAMENTOS*/
CREATE TABLE departamentos (
    d_departamento   INTEGER NOT NULL,
    d_descripcion    VARCHAR2(50)
);

ALTER TABLE departamentos ADD CONSTRAINT departamento_pk PRIMARY KEY ( d_departamento );

/*SCRIPT PARA LA CREACION DE LA TABLA EVALUACIONES*/
CREATE TABLE evaluaciones (
    id_evaluaciones     INTEGER NOT NULL,
    codigo_asignatura   INTEGER NOT NULL,
    codigo_profesor     INTEGER NOT NULL,
    codigo_alumno       INTEGER NOT NULL,
    nota                NUMBER,
    fecha               DATE
);

ALTER TABLE evaluaciones ADD CONSTRAINT evaluaciones_pk PRIMARY KEY ( id_evaluaciones );

/*SCRIPT PARA LA CREACION DE LA TABLA HORARIOS*/
CREATE TABLE horarios (
    id_horarios       INTEGER NOT NULL,
    codigo_profesor   INTEGER NOT NULL,
    curso_curso       INTEGER NOT NULL,
    fecha             DATE
);

ALTER TABLE horarios ADD CONSTRAINT horarios_pk PRIMARY KEY ( id_horarios );

/*SCRIPT PARA LA CREACION DE LA TABLA MATRICULAS*/
CREATE TABLE matriculas (
    id_matriculas   INTEGER NOT NULL,
    codigo_alumno   INTEGER NOT NULL,
    fecha           DATE
);

ALTER TABLE matriculas ADD CONSTRAINT matriculas_pk PRIMARY KEY ( id_matriculas );

/*SCRIPT PARA LA CREACION DE LA TABLA PROFESORES*/
CREATE TABLE profesores (
    id_profesor           INTEGER NOT NULL,
    codigo_departamento   INTEGER NOT NULL,
    rut                   INTEGER,
    nombres               VARCHAR2(60),
    apellido_paterno      VARCHAR2(50),
    apellido_materno      INTEGER,
    fecha_nacimiento      DATE,
    sexo                  VARCHAR2(20),
    celular               INTEGER,
    calle              VARCHAR2(90),
    numero             INTEGER,
    ciudad             VARCHAR2(20)
);

ALTER TABLE profesores ADD CONSTRAINT profesores_pk PRIMARY KEY ( id_profesor );

/*SCRIPT PARA LA CREACION DE LA TABLA SALAS*/
CREATE TABLE salas (
    id_sala       INTEGER NOT NULL,
    numero        INTEGER,
    descripcion   VARCHAR2(200)
);

ALTER TABLE salas ADD CONSTRAINT salas_pk PRIMARY KEY ( id_sala );

/*SCRIPT PARA LA CREACION DE LA TABLA SALAS*/
CREATE TABLE semestres (
    id_semestre          INTEGER NOT NULL,
    codigo_curso         INTEGER NOT NULL,
    codigo_asistencias   INTEGER NOT NULL,
    fecha_inicio         DATE,
    fecha_termino        DATE
);

ALTER TABLE semestres ADD CONSTRAINT semestres_pk PRIMARY KEY ( id_semestre );

/*RELACIONES DE CLAVES FORANEAS*/

ALTER TABLE alumnos
    ADD CONSTRAINT alumnos_apoderados_fk FOREIGN KEY ( codigo_apoderado )
        REFERENCES apoderados ( id_apoderado );

ALTER TABLE asignaturas
    ADD CONSTRAINT asignaturas_cursos_fk FOREIGN KEY ( codigo_curso )
        REFERENCES cursos ( id_curso );

ALTER TABLE asignaturas
    ADD CONSTRAINT asignaturas_horarios_fk FOREIGN KEY ( codigo_horario )
        REFERENCES horarios ( id_horarios );

ALTER TABLE asignaturas
    ADD CONSTRAINT asignaturas_profesores_fk FOREIGN KEY ( codigo_profesor )
        REFERENCES profesores ( id_profesor );

ALTER TABLE asignaturas
    ADD CONSTRAINT asignaturas_semestres_fk FOREIGN KEY ( codigo_semestre )
        REFERENCES semestres ( id_semestre );

ALTER TABLE asistencias
    ADD CONSTRAINT asistencias_alumnos_fk FOREIGN KEY ( codigo_alumno )
        REFERENCES alumnos ( id_alumno );

ALTER TABLE asistencias
    ADD CONSTRAINT asistencias_asignaturas_fk FOREIGN KEY ( codigo_asignatura )
        REFERENCES asignaturas ( id_asignatura );

ALTER TABLE asistencias
    ADD CONSTRAINT asistencias_cursos_fk FOREIGN KEY ( codigo_curso )
        REFERENCES cursos ( id_curso );

ALTER TABLE cursos
    ADD CONSTRAINT cursos_alumnos_fk FOREIGN KEY ( codigo_alumno )
        REFERENCES alumnos ( id_alumno );

ALTER TABLE cursos
    ADD CONSTRAINT cursos_matriculas_fk FOREIGN KEY ( codigo_matriculas )
        REFERENCES matriculas ( id_matriculas );

ALTER TABLE cursos
    ADD CONSTRAINT cursos_salas_fk FOREIGN KEY ( codigo_sala )
        REFERENCES salas ( id_sala );

ALTER TABLE evaluaciones
    ADD CONSTRAINT evaluaciones_alumnos_fk FOREIGN KEY ( codigo_alumno )
        REFERENCES alumnos ( id_alumno );

ALTER TABLE evaluaciones
    ADD CONSTRAINT evaluaciones_asignaturas_fk FOREIGN KEY ( codigo_asignatura )
        REFERENCES asignaturas ( id_asignatura );

ALTER TABLE evaluaciones
    ADD CONSTRAINT evaluaciones_profesores_fk FOREIGN KEY ( codigo_profesor )
        REFERENCES profesores ( id_profesor );

ALTER TABLE horarios
    ADD CONSTRAINT horarios_cursos_fk FOREIGN KEY ( curso_curso )
        REFERENCES cursos ( id_curso );

ALTER TABLE horarios
    ADD CONSTRAINT horarios_profesores_fk FOREIGN KEY ( codigo_profesor )
        REFERENCES profesores ( id_profesor );

ALTER TABLE matriculas
    ADD CONSTRAINT matriculas_alumnos_fk FOREIGN KEY ( codigo_alumno )
        REFERENCES alumnos ( id_alumno );

ALTER TABLE profesores
    ADD CONSTRAINT profesores_departamentos_fk FOREIGN KEY ( codigo_departamento )
        REFERENCES departamentos ( d_departamento );

ALTER TABLE semestres
    ADD CONSTRAINT semestres_asistencias_fk FOREIGN KEY ( codigo_asistencias )
        REFERENCES asistencias ( id_asistencias );

ALTER TABLE semestres
    ADD CONSTRAINT semestres_cursos_fk FOREIGN KEY ( codigo_curso )
        REFERENCES cursos ( id_curso );