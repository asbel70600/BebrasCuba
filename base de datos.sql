CREATE DOMAIN CARNET_I char(11)
CHECK
(
        (
            (   CAST(SUBSTRING(VALUE,7,1) AS INT) BETWEEN 0 AND 5    )
            AND
            (   CAST(CONCAT( '19' , SUBSTRING(VALUE,1,2) , '-' , SUBSTRING(VALUE,3,2) , '-' , SUBSTRING(VALUE,5,2))AS DATE) BETWEEN CAST( '1900-01-01' AS DATE ) AND CAST( '1999-12-31' AS DATE )   )
        )
        OR
        (
            (   CAST(SUBSTRING(VALUE,7,1) AS INT) BETWEEN 6 AND 8    ) 
            AND
            (   CAST(CONCAT('20', SUBSTRING(VALUE,1,2), '-', SUBSTRING(VALUE,3,2), '-', SUBSTRING(VALUE,5,2)) AS DATE) BETWEEN CAST( '2000-01-01' AS DATE ) AND CURRENT_DATE    )
        )
);

CREATE DOMAIN EMAIL VARCHAR(30)
CHECK(
    VALUE LIKE '%@%.%'
);

CREATE DOMAIN SEXO CHAR(1)
CHECK(
    VALUE IN ('M','F')
);

CREATE DOMAIN TELEFONO CHAR(8)
CHECK( 
    VALUE NOT LIKE('% %') 
    AND 
    CAST(VALUE AS bigint) 
    BETWEEN 11111111 AND 99999999
);

CREATE DOMAIN GRADO CHAR(2)
CHECK(
    CAST(VALUE AS SMALLINT) BETWEEN 1 AND 12
);

CREATE TABLE profesores(
    carnet CARNET_I PRIMARY KEY,
    nombre VARCHAR(50),
    correo EMAIL,
    telefono TELEFONO,
    provincia VARCHAR(20),
    municipio VARCHAR(20),
    escuela VARCHAR(50),
    telefono_escuela TELEFONO,
    contrasena VARCHAR(100),
    validado boolean DEFAULT 'false',
    UNIQUE (email),

    CONSTRAINT NOTHING_NULL
        CHECK(
            nombre NOT NULL 
            AND correo NOT NULL 
            AND telefono NOT NULL
            AND provincia NOT NULL
            AND municipio NOT NULL
            AND escuela NOT NULL
            AND telefono_escuela NOT NULL
            AND contrasena NOT NULL
        ),
    
    CONSTRAINT validado_default

);



CREATE TABLE estudiantes(
    carnet CARNET_I PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    grado GRADO NOT NULL,
    sexo SEXO NOT NULL,


    CONSTRAINT NOTHING_NULL
        CHECK(
            nombre NOT NULL 
            AND grado NOT NULL
            AND sexo NOT NULL
        ),
);


CREATE TABLE profesor_estudiantes(
    carnet_estudiante CARNET_I PRIMARY KEY,
    carnet_profesor CARNET_I,
    
    CONSTRAINT referencia_a_estudiantes FOREIGN KEY 
    (carnet_estudiante) REFERENCES estudiantes(carnet)
    ON UPDATE CASCADE
    ON DELETE CASCADE,
    
    CONSTRAINT referencia_a_profesor FOREIGN KEY
    (carnet_profesor) REFERENCES profesores(carnet)
    ON UPDATE CASCADE
    ON DELETE CASCADE
);

CREATE TABLE provincia(
    id serial PRIMARY KEY,
    nombre VARCHAR(30),
)

CREATE TABLE municipio(
    id serial PRIMARY KEY,
    provincia int REFERENCES provincia(id) ON UPDATE CASCADE ON DELETE CASCADE,
    nombre VARCHAR(30)
);