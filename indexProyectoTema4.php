<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Tema 4 David Aparicio</title>
        <link rel="stylesheet" href="webroot/css/estilos.css"/>
        <link rel="icon" type="image/x-icon" href="../doc/img/favicon.ico"/>
    </head>
    <body>
        <header>
            <h1>TEMA 4: TÉCNICAS DE ACCESO A DATOS EN PHP</h1>
            <div id="nav">
                <h2>Ejercicios</h2>
            </div>
        </header>
        <table>
            <thead>
                <tr>
                    <th colspan=>Instrucción</th>
                    <th>Desarrollo</th>
                    <th>Explotación</th>
                    <th>Casa</th>
                </tr>
            </thead>
            <tr>
                <th>Creación</th>
                <td>
                    <a href="mostrarCodigo/mostrarCreacionBDDesarrollo.php" >
                        <img src="doc/img/mysql.png" alt="alt"/>
                    </a>
                </td>
                <td>
                    <a href="mostrarCodigo/mostrarCreacionBD.php" >
                        <img src="doc/img/mysql.png" alt="alt"/>
                    </a>
                </td>
            </tr>
            <tr>
                <th>Carga Inicial</th>
                <td>
                    <a href="mostrarCodigo/mostrarCargaInicialBD.php">
                        <img src="doc/img/mysql.png" alt="alt"/>
                    </a>
                </td>
            </tr>
            <tr>
                <th>Borrado</th>
                <td>
                    <a href="mostrarCodigo/mostrarBorradoBD.php" >
                        <img src="doc/img/mysql.png" alt="alt"/>
                    </a>
                </td>
            </tr>
            <tr>
                <th>Configuracion Conexion</th>
                <td>
                    <a href="mostrarCodigo/mostrarConfiguracionConexionDesarrollo.php" >
                        <img src="doc/img/mysql.png" alt="alt"/>
                    </a>
                </td>
                <td>
                    <a href="mostrarCodigo/mostrarConfiguracionConexionExplotacion.php" >
                        <img src="doc/img/mysql.png" alt="alt"/>
                    </a>
                </td> 
                <td>
                    <a href="mostrarCodigo/mostrarConfiguracionConexionCasa.php" >
                        <img src="doc/img/mysql.png" alt="alt"/>
                    </a>
                </td> 
            </tr>
            <tr>
                <th>LibreriaValidacion</th>
                <td colspan="3">
                    <a href="mostrarCodigo/mostrarLibreriaValidacion.php">
                        <img src="doc/img/php.png" alt="alt"/>
                    </a>
                </td>
            </tr>
        </table>
        <br/>
        <a href="codigoPHP/restaurarDB.php">Restaurar Departamentos</a>
        <a href="codigoPHP/borrarDB.php">Borrar Departamentos</a>
        <br/>
        <table id="ejercicios">
                    <tr>
                        <th>Enunciado</th>
                        <th>Ejecutar PDO</th>
                        <th>Mostrar PDO</th>
                        <th>Ejecutar MySQLi</th>
                        <th>Mostrar MySQLi</th>
                    </tr>
                    <tr>
                        <td>
                            1. (ProyectoTema4) Conexión a la base de datos con la cuenta usuario y tratamiento de errores.
                        </td>
                        <td>
                            <a href="codigoPHP/ejercicio01PDO.php"><img src="doc/img/play.png" alt="play"/></a>
                        </td>
                        <td>
                            <a href="mostrarCodigo/mostrarEjercicio01PDO.php"><img src="doc/img/php.png" alt="muestra"/></a>
                        </td>
                        <td>
                            <a href="codigoPHP/ejercicio01MySQLi.php"><img src="doc/img/play.png" alt="play"/></a>
                        </td>
                        <td>
                            <a href="mostrarCodigo/mostrarEjercicio01MySQLi.php"><img src="doc/img/php.png" alt="muestra"/></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            2. Mostrar el contenido de la tabla Departamento y el número de registros.
                        </td>
                        <td>
                            <a href="codigoPHP/ejercicio02PDO.php"><img src="doc/img/play.png" alt="play"/></a>
                        </td>
                        <td>
                            <a href="mostrarCodigo/mostrarEjercicio02PDO.php"><img src="doc/img/php.png" alt="muestra"/></a>
                        </td>
                        <td>
                            <a href="codigoPHP/ejercicio02MySQLi.php"><img src="doc/img/play.png" alt="play"/></a> 
                        </td>
                        <td>
                            <a href="mostrarCodigo/mostrarEjercicio02MySQLi.php"><img src="doc/img/php.png" alt="muestra"/></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            3. Formulario para añadir un departamento a la tabla Departamento con validación de entrada y
control de errores.
                        </td>
                        <td>
                            <a href="codigoPHP/ejercicio03PDO.php"><img src="doc/img/play.png" alt="play"/></a>
                        </td>
                        <td>
                            <a href="mostrarCodigo/mostrarEjercicio03PDO.php"><img src="doc/img/php.png" alt="muestra"/></a>
                        </td>
                        <td>
                            <!-- <a href=""><img src="doc/img/play.png" alt="play"/></a> --> 
                        </td>
                        <td>
                            <!-- <a href=""><img src="doc/img/php.png" alt="muestra"/></a> --> 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            4. Formulario de búsqueda de departamentos por descripción (por una parte del campo
DescDepartamento, si el usuario no pone nada deben aparecer todos los departamentos).

                        </td>
                        <td>
                            <a href="codigoPHP/ejercicio04PDO.php"><img src="doc/img/play.png" alt="play"/></a>
                        </td>
                        <td>
                            <a href="mostrarCodigo/mostrarEjercicio04PDO.php"><img src="doc/img/php.png" alt="muestra"/></a>
                        </td>
                        <td>
                            <!--<a href=""><img src="doc/img/play.png" alt="play"/></a>-->
                        </td>
                        <td>
                            <!--<a href=""><img src="doc/img/php.png" alt="muestra"/></a>-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            5. Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones
insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno.

                        </td>
                        <td>
                            <a href="codigoPHP/ejercicio05PDO.php"><img src="doc/img/play.png" alt="play"/></a>
                        </td>
                        <td>
                            <a href="mostrarCodigo/mostrarEjercicio05PDO.php"><img src="doc/img/php.png" alt="muestra"/></a>
                        </td>
                        <td>
                            <!--<a href=""><img src="doc/img/play.png" alt="play"/></a>-->
                        </td>
                        <td>
                            <!--<a href=""><img src="doc/img/php.png" alt="muestra"/></a>-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                            6. Pagina web que cargue registros en la tabla Departamento desde un array departamentosnuevos
utilizando una consulta preparada. (Después de programar y entender este ejercicio, modificar los
ejercicios anteriores para que utilicen consultas preparadas). Probar consultas preparadas sin bind,
pasando los parámetros en un array a execute.

                        </td>
                        <td>
                            <a href="codigoPHP/ejercicio06PDO.php"><img src="doc/img/play.png" alt="play"/></a>
                        </td>
                        <td>
                            <a href="mostrarCodigo/mostrarEjercicio06PDO.php"><img src="doc/img/php.png" alt="muestra"/></a>
                        </td>
                        <td>
                            <!--<a href="codigoPHP/"><img src="doc/img/play.png" alt="play"/></a>-->
                        </td>
                        <td>
                            <!--<a href="mostrarCodigo/"><img src="doc/img/php.png" alt="muestra"/></a>-->
                        </td>
                    </tr>
                    <!--<tr>
                        <td>
                           7. Página web que toma datos (código y descripción) de un fichero xml y los añade a la tabla
Departamento de nuestra base de datos. (IMPORTAR). El fichero importado se encuentra en el
directorio .../tmp/ del servidor 
                        </td>
                        <td>
                            <a href="codigoPHP/"><img src="doc/img/play.png" alt="play"/></a>
                        </td>
                        <td>
                            <a href="mostrarCodigo/"><img src="doc/img/php.png" alt="muestra"/></a>
                        </td>
                        <td>
                            <a href="codigoPHP/"><img src="doc/img/play.png" alt="play"/></a>
                        </td>
                        <td>
                            <a href="mostrarCodigo/"><img src="doc/img/php.png" alt="muestra"/></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                          8. Página web que toma datos (código y descripción) de la tabla Departamento y guarda en un
fichero departamento.xml. (COPIA DE SEGURIDAD / EXPORTAR). El fichero exportado se
encuentra en el directorio .../tmp/ del servidor.
Si el alumno dispone de tiempo probar distintos formatos de importación - exportación: XML,
JSON, CSV, TXT,...
Si el alumno dispone de tiempo probar a exportar e importar a o desde un directorio (a elegir) en
el equipo cliente.  
                        </td>
                        <td>
                            <a href="codigoPHP/"><img src="doc/img/play.png" alt="play"/></a>
                        </td>
                        <td>
                            <a href="mostrarCodigo/"><img src="doc/img/php.png" alt="muestra"/></a>
                        </td>
                        <td>
                            <a href="codigoPHP/"><img src="doc/img/play.png" alt="play"/></a>
                        </td>
                        <td>
                            <a href="mostrarCodigo/"><img src="doc/img/php.png" alt="muestra"/></a>
                        </td>
                    </tr>-->
                </table>
        <footer> 
            <a href="../../">Home</a>
            <a href="../doc/CVDavidAparicioSir.pdf" target="blank"><img src="doc/img/cv.png" alt="CV David Aparicio"/></a>
            <a href="../201DWESProyectoDWES/indexProyectoDWES.php"><img src="doc/img/home.png" alt="HOME"/></a>
            <a href="https://www.github.com/davidas02" target="_blank"><img src="doc/img/git.png" alt="github David Aparicio"/></a>
            <p>2022-2023 David Aparicio Sir &COPY; Todos los derechos reservados</p>
        </footer>
    </body>
</html>
