create database if not exists DAW201DBDepartamentos;
use DAW201DBDepartamentos;
use dbs9173955;
create table if not exists Departamento(
    codDepartamento varchar(3) primary key,
    descDepartamento varchar(255) NULL,
    fechaBaja int NULL,
    volumenNegocio float NULL,
    fechaAlta datetime NULL 
)engine=Innodb;
insert into Departamento values
("INF","Departamento de Informatica",null,3500,FROM_UNIXTIME('1668167592')),
("VEN","Departamento de Ventas",null,25000,FROM_UNIXTIME('1668167592')),
("MAR","Departamento de Marketing",null,13657,FROM_UNIXTIME('1668167592')),
("IDE","Departamento de Innovacion y Desarrollo",null,-2350,FROM_UNIXTIME('1668167592')),
("CON","Departamento de Contabilidad",null,44962,FROM_UNIXTIME('1668167592'));
create user if not exists "usuarioDAW201DBDepartamentos"@"%" identified by "paso";
grant all privileges on DAW201DBDepartamentos.* to 'usuarioDAW201DBDepartamentos'@'%';
