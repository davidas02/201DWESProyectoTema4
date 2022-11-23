<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tema 4 ejercicio 8 David Aparicio</title>
        <link rel="stylesheet" href="../webroot/css/estilos.css"/>
        <link rel="icon" type="image/x-icon" href="../doc/img/favicon.ico"/>
    </head>
</head>
<body>
    <header>
        <h1>TEMA 4: TÉCNICAS DE ACCESO A DATOS EN PHP </h1>
        <div id="nav">
            <h2>8. Página web que toma datos (código y descripción) de la tabla Departamento y guarda en un
                fichero departamento.xml. (COPIA DE SEGURIDAD / EXPORTAR). El fichero exportado se
                encuentra en el directorio .../tmp/ del servidor.
                Si el alumno dispone de tiempo probar distintos formatos de importación - exportación: XML,
                JSON, CSV, TXT,...
                Si el alumno dispone de tiempo probar a exportar e importar a o desde un directorio (a elegir) en
                el equipo cliente.</h2>
        </div>
    </header>
    <?php
    require_once '../conf/confDBPDO.php';
    $sql1=<<< sql
            SELECT codDepartamento,descDepartamento FROM Departamento;
            sql;
    try {
        $miDB=new PDO(DSN,USER,PASS);
        $resultado=$miDB->prepare($sql1);
        $resultado->execute();
        $departamento=$resultado->fetchObject();
    } catch (PDOException $exc) {
        echo $exc->getTraceAsString();
        $miXML->endDocument();
    } finally {
        unset($miDB);
    }
        ?>
    <footer> 
        <a href="../../doc/CVDavidAparicioSir.pdf" target="blank"><img src="../doc/img/cv.png" alt="CV David Aparicio"/></a>
        <a href="../indexProyectoTema4.php"><img src="../doc/img/home.png" alt="HOME"/></a>
        <a href="https://www.github.com/davidas02" target="_blank"><img src="../doc/img/git.png" alt="github David Aparicio"/></a>
        <p>2022-2023 David Aparicio Sir &COPY; Todos los derechos reservados</p>
    </footer>
</body>
</html>
