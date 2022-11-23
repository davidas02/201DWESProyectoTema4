<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tema  ejercicio  David Aparicio</title>
        <link rel="stylesheet" href="../webroot/css/estilos.css"/>
        <link rel="icon" type="image/x-icon" href="../doc/img/favicon.ico"/>
    </head>
</head>
<body>
    <header>
        <h1>Tema </h1>
        <div id="nav">
            <h2>Enunciado</h2>
        </div>
    </header>
    <?php
    include_once '../conf/confDBPDO.php';
    try {
        //Establecimiento de la conexión 
        $miDB = new PDO(DSN, USER, PASS);

        $creacion = $miDB->prepare(<<<SQL
    create table if not exists Departamento(
    codDepartamento varchar(3) primary key,
    descDepartamento varchar(255) NULL,
    fechaBaja int NULL,
    volumenNegocio float NULL,
    fechaAlta datetime NULL 
    )engine=Innodb;
    SQL);
        $creacion->execute(); //Ejecuto la consulta
        if ($creacion) {
            echo "<h3>Creacion ejecutada con exito</<h3>";
        }
        $insercion = $miDB->prepare(<<<SQL
        insert into Departamento values
            ("INF","Departamento de Informatica",null,3500,FROM_UNIXTIME('1668167592')),
                ("VEN","Departamento de Ventas",null,25000,FROM_UNIXTIME('1668167592')),
                    ("MAR","Departamento de Marketing",null,13657,FROM_UNIXTIME('1668167592')),
                        ("IDE","Departamento de Innovacion y Desarrollo",null,-2350,FROM_UNIXTIME('1668167592')),
                            ("CON","Departamento de Contabilidad",null,44962,FROM_UNIXTIME('1668167592'));
        SQL);
        $insercion->execute(); //Ejecuto la consulta
        if ($insercion) {
            echo "<h3>Insercion ejecutada con exito</<h3>";
            $resultadoDepartamentos = $miDB->query("select * from Departamento");
        }
    } catch (PDOException $excepcion) {//Código que se ejecutará si se produce alguna excepción
        //Almacenamos el código del error de la excepción en la variable $errorExcepcion
        $errorExcep = $excepcion->getCode();
        //Almacenamos el mensaje de la excepción en la variable $mensajeExcep
        $mensajeExcep = $excepcion->getMessage();

        echo "<span style='color: red;'>Error: </span>" . $mensajeExcep . "<br>"; //Mostramos el mensaje de la excepción
        echo "<span style='color: red;'>Código del error: </span>" . $errorExcep; //Mostramos el código de la excepción
    } finally {
        // Cierre de la conexión.
        unset($mydb);
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
