<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tema 4 ejercicio 01 David Aparicio</title>
        <link rel="stylesheet" href="../webroot/css/estilos.css"/>
        <link rel="icon" type="image/x-icon" href="../doc/img/favicon.ico"/>
    </head>
</head>
<body>
    <header>
        <h1>TEMA 4: TÉCNICAS DE ACCESO A DATOS EN PHP</h1>
        <div id="nav">
            <h2>Ejercicio 1. Conexión a la base de datos con la cuenta usuario y tratamiento de errores.</h2>
        </div>
    </header>
    <?php
    /**
     *  @author David Aparicio Sir
     *  @version 1.0
     *  ultima actualizacion 15/11/2022
     */
    require_once '../conf/confDBPDO.php';
    
    $aAtributos = [
                    'AUTOCOMMIT' ,
                    'CASE',
                    'CLIENT_VERSION',
                    "CONNECTION_STATUS",
                    "DRIVER_NAME",
                    "ERRMODE",
                    "ORACLE_NULLS",
                    "PERSISTENT",
                    //"PREFETCH",
                    "SERVER_INFO",
                    "SERVER_VERSION",
                    //"TIMEOUT"
                    ];
    //conexion correcta

    try {
        echo 'Conexion 1 <br/>';
        $miDB = new PDO (DSN,USER,PASS );
        echo 'conexion establecida con exito<br/>';
        
        print '<table>';
        //$miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        foreach ($aAtributos as $atributo){
            print "<tr>";
            print "<td>".$atributo."</td>";
            print "<td>".$miDB->getAttribute(constant("PDO::ATTR_$atributo"))."</td>";
            print "</tr>";
        }
         print '</table>';
        print "No funcionan los atributos PREFETCH y TIMEOUT<br/>";
    } catch (PDOException $miExcepcionPDO) {
        echo $miExcepcionPDO->getMessage();
        
    }
    
     try {
        echo 'Conexion 2 <br/>';
        $miDB = new PDO ("mysql:dbname=DAW201DBDepartamentos;host=192.168.20.19","usuarioDAW201DBDepartamentos","PASS" );
        echo 'conexion establecida con exito<br/>';
        
        print '<table>';
        //$miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        foreach ($aAtributos as $atributo){
            print "<tr>";
            print "<td>".$atributo."</td>";
            print "<td>".$miDB->getAttribute(constant("PDO::ATTR_$atributo"))."</td>";
            print "</tr>";
        }
         print '</table>';
        print "No funcionan los atributos PREFETCH y TIMEOUT";
    } catch (PDOException $miExcepcionPDO) {
        echo "Error ".$miExcepcionPDO->getCode();
        
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