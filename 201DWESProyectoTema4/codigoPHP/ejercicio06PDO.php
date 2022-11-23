<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tema 4 ejercicio 6 David Aparicio</title>
        <link rel="stylesheet" href="../webroot/css/estilos.css"/>
        <link rel="icon" type="image/x-icon" href="../doc/img/favicon.ico"/>
    </head>
</head>
<body>
    <header>
        <h1>TEMA 4: TÉCNICAS DE ACCESO A DATOS EN PHP </h1>
        <div id="nav">
            <h2>Pagina web que cargue registros en la tabla Departamento desde un array departamentosnuevos
                utilizando una consulta preparada. (Después de programar y entender este ejercicio, modificar los
                ejercicios anteriores para que utilicen consultas preparadas). Probar consultas preparadas sin bind,
                pasando los parámetros en un array a execute.</h2>
        </div>
    </header>
    <?php
    /**
     *  @author David Aparicio Sir
     *  @version 1.1
     *  ultima actualizacion 15/11/2022
     */
    require_once '../conf/confDBPDO.php';
    //Array en el cual estan almacenados los departamentos a registrar
    $aDepartamentos = [
        ["codDepartamento" => "FOR",//codigo de departamento de formacion
        "descDepartamento" => "Departamento de Formacion",//descripcion del departamento de Formacion
        "volumenNegocio" => "1"],//volumen de negocio del departamento de Formacion
        ["codDepartamento" => "THR",//codigo de departamento de THR
        "descDepartamento" => "Departamento de THR",//descripcion del departamento THR
        "volumenNegocio" => "85"],//volumen de negocio del departamento THR
        ["codDepartamento" => "PPP",//codigo de departamento de PPP
        "descDepartamento" => "Departamento de PPP",//descripcion del departamento  PPP
        "volumenNegocio" => "1234.63"] //volumen de negocio del departamento PPP
    ];
    try {
        //hacemos la conexion
        $miDB = new PDO(DSN, USER, PASS);
        //crear insert
        $query2 = <<< sql2
                    INSERT INTO Departamento (codDepartamento,descDepartamento,volumenNegocio,fechaAlta)
                            VALUES(:codDepartamento,:descDepartamento,:volumenNegocio,now());
                    sql2;
        //Bucle foreach en el cual se introducen los departamentos de 1 en 1
        foreach ($aDepartamentos as $aDepartamento) {
            $parametrosConsulta=[":codDepartamento"=>$aDepartamento['codDepartamento'],
                                 ":descDepartamento"=>$aDepartamento['descDepartamento'],
                                 ":volumenNegocio"=>$aDepartamento['volumenNegocio']];
            
                $insert = $miDB->prepare($query2);//preparamos la insercion de los datos
                $insert->execute($parametrosConsulta);//insertamos los datos introducidos en el array
        }
         
        //si todo ha ido bien mostramos todos los registros
        $resultadoDepartamentos = $miDB->query("select * from Departamento");
        //creamos la tabla
        print '<table>';
        //introducimos la cabecera de la tabla
        print '<tr><th>codDepartamento</th><th>descDepartamento</th><th>fechaBaja</th><th>volumenNegocio</th><th>fechaAlta</th></tr>';
        //recojemos el departamento como un objeto
        $oDepartamento = $resultadoDepartamentos->fetchObject();
        //mientras que el objeto sea distinto a null continuamos en la tabla
            while ($oDepartamento != null) {
                print"<tr>";
                echo "<td>$oDepartamento->codDepartamento</td>";//escribimos en la tabla el codigo del departamento
                echo "<td>$oDepartamento->descDepartamento</td>";//escribimos en la tabla la descripcion del departamento
                echo "<td>$oDepartamento->fechaBaja</td>";//escribimos en la tabla la fecha de baja del departamento
                echo "<td>$oDepartamento->volumenNegocio</td>";//escribimos en la tabla el volumen de negocio del departamento
                echo "<td>$oDepartamento->fechaAlta</td>";//escribimos en la tabla la fecha de alta del departamento
                $oDepartamento = $resultadoDepartamentos->fetchObject();//recojemos el departamento 
                print "</tr>";
            }
        print '</table>';//cerramos la tabla
    } catch (PDOException $miExcepcionPDO) {
        //mostramos el mensaje de error
        echo $miExcepcionPDO->getMessage();
    } finally {
        //nos desconectamos de la base de datos
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
