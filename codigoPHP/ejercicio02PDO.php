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
            <h2>2. Mostrar el contenido de la tabla Departamento y el número de registros.</h2>
        </div>
    </header>
    <?php
    /**
     *  @author David Aparicio Sir
     *  @version 1.0
     *  ultima actualizacion 15/11/2022
     */
    require_once '../conf/confDBPDO.php';
    try {
        $miDB = new PDO(DSN, USER, PASS);
        print 'Consulta sin preparar';
        $sqlDepartamento="select * from Departamento";
        $resultadoDepartamentos = $miDB->query($sqlDepartamento);
        print '<table>';
        print '<tr><th>Codigo Departamento</th><th>Descripcion Departamento</th><th>Fecha Baja</th><th>Volumen Negocio</th><th>Fecha Alta</th></tr>';
        $mostrarDepartamentos = $resultadoDepartamentos->fetchObject();
        while ($mostrarDepartamentos != null) {
            print"<tr>";
            echo "<td>$mostrarDepartamentos->codDepartamento</td>";
            echo "<td>$mostrarDepartamentos->descDepartamento</td>";
            echo "<td>$mostrarDepartamentos->fechaBaja</td>";
            echo "<td>$mostrarDepartamentos->volumenNegocio</td>";
            echo "<td>$mostrarDepartamentos->fechaAlta</td>";
            
            $mostrarDepartamentos = $resultadoDepartamentos->fetchObject();
        }
        print '</table >';
        $nDepartamentos=$resultadoDepartamentos->rowCount();
        print"Hay $nDepartamentos resultados<br/>";
        print "Consulta preparada";
        $cPreparada=$miDB->prepare($sqlDepartamento);
        $cPreparada->execute();
        print '<table>';
                print '<tr><th>Codigo Departamento</th><th>Descripcion Departamento</th><th>Fecha Baja</th><th>Volumen Negocio</th><th>Fecha Alta</th></tr>';
        $oDepartamento = $cPreparada->fetchObject();
        
        while ($oDepartamento != null) {
            print"<tr>";
            echo "<td>$oDepartamento->codDepartamento</td>";
            echo "<td>$oDepartamento->descDepartamento</td>";
            echo "<td>$oDepartamento->fechaBaja</td>";
            echo "<td>$oDepartamento->volumenNegocio</td>";
            echo "<td>$oDepartamento->fechaAlta</td>";
            
            $oDepartamento = $cPreparada->fetchObject();
        }
        print '</table>';
        $nDepartamentos=$cPreparada->rowCount();
        print"Hay $nDepartamentos resultados<br style='margin-bottom=100px'/>";
    } catch (PDOException $miExcepcionPDO) {
        echo $miExcepcionPDO->getMessage();
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