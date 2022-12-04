create database if not exists DAW201DBDepartamentos;
use DAW201DBDepartamentos;
create table if not exists Departamento(
    codDepartamento varchar(3) primary key,
    descDepartamento varchar(255) NULL,
    fechaBaja int NULL,
    volumenNegocio float NULL,
    fechaAlta datetime NULL 
)engine=Innodb;

create user if not exists "usuarioDAW201DBDepartamentos"@"%" identified by "paso";
grant all privileges on DAW201DBDepartamentos.* to 'usuarioDAW201DBDepartamentos'@'%';
