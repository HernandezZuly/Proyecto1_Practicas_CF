create database actividad;
use actividad;
create table Ciudad(
	idCiudad INT PRIMARY KEY AUTO_INCREMENT,
    ciudad VARCHAR(50) NOT NULL
);

create table Ocupacion(
	idOcupacion INT PRIMARY KEY AUTO_INCREMENT, 
    ocupacion VARCHAR(20) NOT NULL
);

create table Usuario(
	idUsuario INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
	numero_documento BIGINT NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    fecha_nacimiento DATE,
    idCiudad INT NOT NULL,
    correo VARCHAR(50) NOT NULL,
    clave VARCHAR(50) NOT NULL,
    telefono BIGINT NOT NULL UNIQUE,
	idOcupacion INT NOT NULL,
    viabilidad VARCHAR(10) NOT NULL
);

ALTER TABLE Usuario ADD CONSTRAINT Ciudad_Usuario FOREIGN KEY (idCiudad) REFERENCES Ciudad (idCiudad);
ALTER TABLE Usuario ADD CONSTRAINT Ocupacion_Usuario FOREIGN KEY (idOcupacion) REFERENCES Ocupacion (idOcupacion);

-- PROCEDIMIENTOS CIUDAD 
delimiter $
create procedure pa_insertarCiudad(
    in pciudad VARCHAR(50))
begin
INSERT INTO Ciudad (ciudad) VALUES (pciudad);
end $
delimiter ;
call pa_insertarCiudad('Arauca');
call pa_insertarCiudad('Armenia');
call pa_insertarCiudad('Barranquilla');
call pa_insertarCiudad('Bogota');
call pa_insertarCiudad('Bucaramanga');
call pa_insertarCiudad('Cali');
call pa_insertarCiudad('Cartagena');
call pa_insertarCiudad('Chia');
call pa_insertarCiudad('Cucuta');
call pa_insertarCiudad('Florencia');
call pa_insertarCiudad('Girardot');
call pa_insertarCiudad('Huila');
call pa_insertarCiudad('Ibague');
call pa_insertarCiudad('Inirida');
call pa_insertarCiudad('Leticia');
call pa_insertarCiudad('Manizales');
call pa_insertarCiudad('Medellin');
call pa_insertarCiudad('Monteria');
call pa_insertarCiudad('Neiva');
call pa_insertarCiudad('Pasto');
call pa_insertarCiudad('Pereira');
call pa_insertarCiudad('Popayan');
call pa_insertarCiudad('Quibdo');
call pa_insertarCiudad('Riohacha');
call pa_insertarCiudad('Santa Marta');
call pa_insertarCiudad('Santa Rosa de Cabal');
call pa_insertarCiudad('Sincelejo');
call pa_insertarCiudad('Soacha');
call pa_insertarCiudad('Tunja');
call pa_insertarCiudad('Valledupar');
call pa_insertarCiudad('Villavicencio');
call pa_insertarCiudad('Yopal');

delimiter $
create procedure pa_consultarCiudad()
BEGIN
SELECT * FROM Ciudad;
end $

create procedure pa_consultarCiudadPorId (in pidOcupacion INTEGER)
BEGIN
SELECT * FROM Ciudad WHERE idOcupacion = pidOcupacion;
end $

-- PROCEDIMIENTOS OCUPACION 
delimiter $
create procedure pa_insertarOcupacion(
    in pocupacion VARCHAR(50))
begin
INSERT INTO Ocupacion (ocupacion) VALUES (pocupacion);
end $
delimiter ;
call pa_insertarOcupacion('Empleado');
call pa_insertarOcupacion('Independiente');
call pa_insertarOcupacion('Pensionado');

-- PROCEDIMIENTOS USUARIO 
delimiter $
create procedure pa_insertarUsuario(
	in pnumero_documento BIGINT,
    in pnombre VARCHAR(50),
    in papellido VARCHAR(50),
    in pfecha_nacimiento DATE,
    in pidCiudad INT,
    in pcorreo VARCHAR(50),
    in pclave VARCHAR(50),
    in ptelefono BIGINT,
	in pidOcupacion INT,
    in pviabilidad VARCHAR(10))
begin
INSERT INTO Usuario (numero_documento, nombre, apellido, fecha_nacimiento, idCiudad, correo, clave, telefono, idOcupacion, viabilidad) VALUES (pnumero_documento, pnombre, papellido, pfecha_nacimiento, pidCiudad, pcorreo, pclave, ptelefono, pidOcupacion,  pviabilidad);
end $

create procedure pa_consultarUsuario()
BEGIN
SELECT * FROM Usuario;
end $

create procedure pa_consultarUsuarioPorId (in pidUsuario INTEGER)
BEGIN
SELECT * FROM Usuario WHERE idUsuario = pidUsuario;
end $

create procedure pa_actualizarUsuario (
	in pidUsuario INT,
	in pnumero_documento BIGINT,
    in pnombre VARCHAR(50),
    in papellido VARCHAR(50),
    in pfecha_nacimiento DATE,
    in pidCiudad INT,
    in pcorreo VARCHAR(50),
    in pclave VARCHAR(50),
    in ptelefono BIGINT,
	in pidOcupacion INT,
    in pviabilidad VARCHAR(10))
BEGIN
UPDATE Usuario 
SET numero_documento = pnumero_documento,
	nombre = pnombre, 
    apellido = papellido, 
	fecha_nacimiento = pfecha_nacimiento, 
    idCiudad = pidCiudad, 
    correo = pcorreo, 
    clave = pclave, 
    telefono = ptelefono, 
    idOcupacion = pidOcupacion,
    viabilidad = pviabilidad
WHERE idUsuario = pidUsuario ;
end $

create procedure pa_eliminarUsuario (in pidUsuario INTEGER)
BEGIN
DELETE FROM Usuario WHERE idUsuario = pidUsuario;
end $
delimiter ;
