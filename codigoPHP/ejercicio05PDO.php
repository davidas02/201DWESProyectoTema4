<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Tema 4 ejercicio 5 David Aparicio</title>
        <link rel="stylesheet" href="../webroot/css/estilos.css"/>
        <link rel="icon" type="image/x-icon" href="../doc/img/favicon.ico"/>
    </head>
</head>
<body>
    <header>
        <h1>TEMA 4: TÉCNICAS DE ACCESO A DATOS EN PHP </h1>
        <div id="nav">
            <h2>5. Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno.</h2>
        </div>
    </header>
    <?php
    /**
     *  @author David Aparicio Sir
     *  @version 1.1
     *  ultima actualizacion 15/11/2022
     */
    require_once '../conf/confDBPDO.php';
    
    try {
        $ejecucionCorrecta=true;
        //hacemos la conexion
            $miDB=new PDO(DSN,USER,PASS);
            //desactivamos el modo autocommit
            $miDB->beginTransaction();
            //realizamos 3 inserciones 1 de ellas esta ya introducida la primary key
                $resultadoConsulta1=$miDB->exec("INSERT INTO Departamento (codDepartamento,descDepartamento,volumenNegocio,fechaAlta) VALUES('TES','Departamento de Transporte',123523.32,now())");
                $resultadoConsulta2=$miDB->exec("INSERT INTO Departamento (codDepartamento,descDepartamento,volumenNegocio,fechaAlta) VALUES('PRO','Departamento de Produccion',15826,now())");
                $resultadoConsulta3=$miDB->exec("INSERT INTO Departamento (codDepartamento,descDepartamento,volumenNegocio,fechaAlta) VALUES('RHH','Departamento de Recursos Humanos',125,now())");

                //hacemos el commit
                $miDB->commit();
            
                
            //si todo ha ido bien mostramos todos los registros
            $resultadoDepartamentos=$miDB->query("select * from Departamento");
            print '<table>';
            print '<tr><th>codDepartamento</th><th>descDepartamento</th><th>fechaBaja</th><th>volumenNegocio</th><th>fechaAlta</th></tr>';
            $mostrarDepartamentos=$resultadoDepartamentos->fetchObject();
            while ($mostrarDepartamentos!=null) {
                print"<tr>";
                while ($mostrarDepartamentos!=null) {
                print"<tr>";
                echo "<td>$mostrarDepartamentos->codDepartamento</td>";
                echo "<td>$mostrarDepartamentos->descDepartamento</td>";
                echo "<td>$mostrarDepartamentos->fechaBaja</td>";
                echo "<td>$mostrarDepartamentos->volumenNegocio</td>";
                echo "<td>$mostrarDepartamentos->fechaAlta</td>";
                $mostrarDepartamentos=$resultadoDepartamentos->fetchObject();
            }
                print "</tr>";
            }
            print '</table>';
        } catch (PDOException $miExcepcionPDO) {
            //revierte los cambios
                $miDB->rollBack();
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
