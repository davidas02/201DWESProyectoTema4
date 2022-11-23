<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tema 4 ejercicio 02 David Aparicio</title>
        <link rel="stylesheet" href="../webroot/css/estilos.css"/>
        <link rel="icon" type="image/x-icon" href="../doc/img/favicon.ico"/>
    </head>
    </head>
    <body>
        <header>
            <h1>TEMA 4: TÉCNICAS DE ACCESO A DATOS EN PHP</h1>
            <div id="nav">
                <h2>2. Mostrar el contenido de la tabla Departamento y el número de registros. MySQLi</h2>
            </div>
        </header>
        <?php
        require_once '../conf/confDBMySQLi.php';
        
        try {
        $miDB = new mysqli();
        $miDB->connect(IP, USER, PASS, DB);
        print "Conexion establecida";
        $resultadoDepartamentos=$miDB->query("select * from Departamento");
           print '<table>';
            print '<tr><th>codDepartamento</th><th>descDepartamento</th><th>fechaBaja</th><th>volumenNegocio</th><th>fechaAlta</th></tr>';
            $oDepartamento=$resultadoDepartamentos->fetch_object();
            while ($oDepartamento!=null) {
                print"<tr>";
                echo "<td>$oDepartamento->codDepartamento</td>";
                echo "<td>$oDepartamento->descDepartamento</td>";
                echo "<td>$oDepartamento->fechaBaja</td>";
                echo "<td>$oDepartamento->volumenNegocio</td>";
                echo "<td>$oDepartamento->fechaAlta</td>";
                $oDepartamento=$resultadoDepartamentos->fetch_object();
            }
            print '</table>';
            print"Hay $resultadoDepartamentos->num_rows resultados";
    } catch (mysqli_sql_exception $mse) {
        echo $mse->getMessage();
    } finally {
        $miDB->close();
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