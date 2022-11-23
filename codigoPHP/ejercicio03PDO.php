<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tema 4 ejercicio 3 David Aparicio</title>
        <link rel="stylesheet" href="../webroot/css/estilos.css"/>
        <link rel="icon" type="image/x-icon" href="../doc/img/favicon.ico"/>
    </head>
</head>
<body>
    <header>
        <h1>TEMA 4: TÉCNICAS DE ACCESO A DATOS EN PHP </h1>
        <div id="nav">
            <h2>3. Formulario para añadir un departamento a la tabla Departamento con validación de entrada y control de errores.</h2>
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
    //comprobamos que la entrada este correcta
    $entradaOK = true;

    //declaracion del array de errores en la entrada del codigo
    $aErrores = ['codigo' => null,
        'descripcion' => null,
        'volumenNegocio' => null,
        'fechaAlta' => null
    ];

    //declaracion del array de respuestas correctas
    $aRespuestas = ['codigo' => null,
        'descripcion' => null,
        'volumenNegocio' => null,
        'fechaAlta' => null
    ];

    //comprobamos que los datos estan correctos

    if (isset($_REQUEST['insertar'])) {
        $aErrores['codigo'] = validacionFormularios::comprobarAlfabetico($_REQUEST['codigo'], 3, 3, 1);
        if ($aErrores['codigo'] == null) {
            if ($_REQUEST['codigo'] == strtoupper($_REQUEST['codigo'])) {

                try {
                    $miDB = new PDO(DSN, USER, PASS);
                    $query2 = <<< sql2
                    SELECT * FROM Departamento where codDepartamento='$_REQUEST[codigo]';
                    sql2;
                    $select = $miDB->query($query2);
                    if ($select->rowCount() > 0) {
                        $aErrores['codigo'] = "El codigo introducido ya existe";
                    }
                } catch (PDOException $miExcepcionPDO) {
                    echo $miExcepcionPDO->getMessage();
                } finally {
                    unset($miDB);
                }
            } else {
                $aErrores['codigo'] = "El codigo ha de ser en Mayusculas con formato XXX";
            }
        }
        $aErrores['descripcion'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descripcion'], 255, 0, 1);
        $aErrores['volumenNegocio'] = validacionFormularios::comprobarFloat($_REQUEST['volumenNegocio'], obligatorio: 1);
        $aErrores['fechaAlta'] = validacionFormularios::validarFecha($_REQUEST['fechaAlta']);
        //comprobamos que el codigo escrito no esta en la base de datos
        //recorremos el array de errores
        foreach ($aErrores as $key => $value) {
            if ($value != null) {
                $entradaOK = false;
                $_REQUEST[$key] = '';
            }
        }
    } else {
        $entradaOK = false;
    }
    //si la entrada es correcta entradaOK==true instroduce los datos en la base de datos
    if ($entradaOK) {
        $aRespuestas['codigo'] = $_REQUEST['codigo'];
        $aRespuestas['descripcion'] = $_REQUEST['descripcion'];
        $aRespuestas['volumenNegocio'] = $_REQUEST['volumenNegocio'];
        $aRespuestas['fechaAlta'] = $_REQUEST['fechaAlta'];
        $oFechaAlta = new DateTime($aRespuestas['fechaAlta'], new DateTimeZone("Europe/Madrid"));
        $time = $oFechaAlta->getTimestamp();
        try {
            $miDB = new PDO(DSN, USER, PASS);
            $query1 = <<< sql
             INSERT INTO Departamento VALUES (:codigo, :descripcion,null,:volumenNegocio,FROM_UNIXTIME(:fechaAlta));
            sql;
            $insert = $miDB->prepare($query1);
            $insert->bindParam(":codigo", $aRespuestas['codigo']);
            $insert->bindParam(":descripcion", $aRespuestas['descripcion']);
            $insert->bindParam(":volumenNegocio", $aRespuestas['volumenNegocio']);
            $insert->bindParam(":fechaAlta", $time);
            $insert->execute();
            $queryMuestra = <<< sql
                    select * from Departamento
                    sql;
            echo "Departamento insertado con éxito";
            //Tabla con todos los departamentos
            $resultadoDepartamentos = $miDB->query($queryMuestra);
            print '<table>';
            print '<tr><th>codDepartamento</th><th>descDepartamento</th><th>fechaBaja</th><th>volumenNegocio</th><th>fechaAlta</th></tr>';
            $oDepartamento = $resultadoDepartamentos->fetchObject();
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
        } catch (PDOException $miExcepcionPDO) {
            echo $miExcepcionPDO->getMessage();
        } finally {
            unset($miDB);
        }
        //si la entrada no es correcta o no hay entradas previas muestra el formulario
    } else {
        ?>
        <form name="formulario" action=<?php echo $_SERVER["PHP_SELF"]; ?> method="post">

            <label for="codigo">Codigo del Departamento:
                <input  type="text" name="codigo" placeholder="Formato XXX" value='<?php echo $_REQUEST['codigo'] ?? ''; ?>'/>
                <a style=color:red;><?php echo $aErrores['codigo'] ?></a>
            </label>
            <br/>
            <label for="descripcion">Descripcion:
                <input  type="text" name="descripcion" placeholder="Introduce la descripcion del departamento" value='<?php echo $_REQUEST['descripcion'] ?? ''; ?>'/>
                <a style=color:red;> <?php echo $aErrores['descripcion'] ?>  </a>
            </label>
            <br/>
            <label for="volumenNegocio">Volumen de Negocio:
                <input  type="text" name="volumenNegocio" placeholder="1234.56" value='<?php echo $_REQUEST['volumenNegocio'] ?? ''; ?>'/>
                <a style=color:red;> <?php echo $aErrores['volumenNegocio'] ?>  </a>
            </label>
            <br/>
            <label for="fechaAta">fecha de Alta:
                <input  type="datetime" name="fechaAlta" placeholder="dd-mm-aaaa" value='<?php echo $_REQUEST['fechaAlta'] ?? ''; ?>'/>
                <a style=color:red;> <?php echo $aErrores['fechaAlta'] ?>  </a>
            </label>
            <br/>
            <input type="submit" name="insertar" value="Insertar">
        </form>
        <?php
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
