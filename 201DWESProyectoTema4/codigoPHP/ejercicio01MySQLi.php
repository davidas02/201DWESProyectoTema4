<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tema 4 ejercicio 01 MySQLi David Aparicio</title>
        <link rel="stylesheet" href="../webroot/css/estilos.css"/>
        <link rel="icon" type="image/x-icon" href="../doc/img/favicon.ico"/>
    </head>
</head>
<body>
    <header>
        <h1>TEMA 4: TÉCNICAS DE ACCESO A DATOS EN PHP </h1>
        <div id="nav">
            <h2>Ejercicio 1. Conexión a la base de datos con la cuenta usuario y tratamiento de errores.</h2>
        </div>
    </header>
    <?php
    require_once '../conf/confDBMySQLi.php';
    //Conexion correcta mysqli
    try {
        $miDB = new mysqli();
        $miDB->connect(IP, USER, PASS, DB);
        print "Conexion establecida<br/>";
        
    } catch (mysqli_sql_exception $mse) {
        echo $mse->getMessage();
    } finally {
        $miDB->close();
    }

    //conexion erronea mysqli
    try {
        $miDB = new mysqli("192.168.3.208", "usuarioDAW201DBDepartamentos", "passInco", "DAW201DBDepartamentos");
        $error = $miDB->connect_errno;
        print $error;
        print "Conexion establecida";
    } catch (mysqli_sql_exception $mse) {
        echo $mse->getMessage();
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