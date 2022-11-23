<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tema 4 ejercicio 4 David Aparicio</title>
        <link rel="stylesheet" href="../webroot/css/estilos.css"/>
        <link rel="icon" type="image/x-icon" href="../doc/img/favicon.ico"/>
    </head>
</head>
<body>
    <header>
        <h1>TEMA 4: TÉCNICAS DE ACCESO A DATOS EN PHP </h1>
        <div id="nav">
            <h2>4. Formulario de búsqueda de departamentos por descripción (por una parte del campo DescDepartamento, si el usuario no pone nada deben aparecer todos los departamentos).</h2>
        </div>
    </header>
    <?php
    /**
     *  @author David Aparicio Sir
     *  @version 1.1
     *  ultima actualizacion 15/11/2022
     */
    require_once '../core/221024libreriaValidacionFormularios.php';
    require_once '../conf/confDBPDO.php';
    //declaracion del mensaje de error
    $error = null;
    //Declaracion array respuestas
    $aRespuestas = [
        'descripcion' => null
    ];
    if (isset($_REQUEST['buscar'])) {
        $error = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 255, 0, 0);
        //comprobamos que no hay errores
        if ($error != null) {
            $_REQUEST['descripcion'] = '';
        }else{
            $aRespuestas['descripcion'] = $_REQUEST['descripcion'];
        }
    } else {

    }
    ?>
        <form name="formulario" action=<?php echo $_SERVER["PHP_SELF"]; ?> method="post">
        <label for="descripcion">Descripcion:
            <input  type="text" name="descripcion" placeholder="Introduce la descripcion del departamento" value='<?php echo $aRespuestas['descripcion'] ?>'/>
            
        </label>
        <input type="submit" name="buscar" value="buscar">
        <br/>
    </form>
        <?php
        //Mostramos los departamentos con esta descripcion
        try {
            $miDB = new PDO(DSN, USER, PASS);
            $resultadoDepartamentos = $miDB->prepare("select * from Departamento where descDepartamento like'%$aRespuestas[descripcion]%';");
            $resultadoDepartamentos->execute();
            $oDepartamento = $resultadoDepartamentos->fetchObject();
            if(is_object($oDepartamento)){
                print '<table>';
                print '<tr><th>codDepartamento</th><th>descDepartamento</th><th>fechaBaja</th><th>volumenNegocio</th><th>fechaAlta</th></tr>';
                while ($oDepartamento != null) {
                    print"<tr>";
                    echo "<td>$oDepartamento->codDepartamento</td>";
                    echo "<td>$oDepartamento->descDepartamento</td>";
                    echo "<td>$oDepartamento->fechaBaja</td>";
                    echo "<td>$oDepartamento->volumenNegocio</td>";
                    echo "<td>$oDepartamento->fechaAlta</td>";
                    $oDepartamento = $resultadoDepartamentos->fetchObject();
                }
                print '</table>';
            } else {
                print 'No hay departamentos con esta descripcion';
            }
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
