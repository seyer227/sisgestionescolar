CREATE TABLE usuarios(
    id_usuario INT (11) not null AUTO_INCREMENT PRIMARY KEY,
    nombres VARCHAR(255) not null,
    cargo   VARCHAR(255) not null,
    email   VARCHAR(255) not null UNIQUE KEY,
    password text not null,
    fyh_creacion      DATETIME null,
    fyh_actualizacion DATETIME null,
    estado VARCHAR(11)
)ENGINE=InnoDB;
iNSERT INTO usuarios (nombres, cargo, email, password, fyh_creacion, estado) 
VALUES ('ALBERTO REYES', 'ADMINISTRADOR', 'areyes@extmet.com','123456','2025-01-01 20:29:00','1');

CREATE TABLE roles(
    id_rol INT (11) not null AUTO_INCREMENT PRIMARY KEY,
    nombre_rol VARCHAR(255) not null UNIQUE KEY,
    fyh_creacion      DATETIME null,
    fyh_actualizacion DATETIME null,
    estado VARCHAR(11)
)ENGINE=InnoDB;
iNSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('ADMINISTRADOR','2025-01-21 11:58:00','1');
iNSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('GERENTE DE PLANTA','2025-01-21 11:58:00','1');
iNSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('JEFE DE AREA','2025-01-21 11:58:00','1');
iNSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('COORDINADOR','2025-01-21 11:58:00','1');
iNSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('SUPERVISOR','2025-01-21 11:58:00','1');
iNSERT INTO roles (nombre_rol, fyh_creacion, estado) VALUES ('OPERADOR','2025-01-21 11:58:00','1');