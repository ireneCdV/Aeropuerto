<?php
    include_once '../Conecta/conexion.php';

    $conexion = Conexion::obtenerConexion();

    //estos son los datos que suponemos que hemos cogido de un formulario

    $nombre = "Carmen";
    $apellidos = "Palacios";
    $edad = 28;
    $idVuelo = 1;

    //paso 1: montar la consulta preparada, es decir, la sql colocando una  ? en cada valor
    $sql = "INSERT INTO pasajero (nombre,apellidos,edad,idVuelo) VALUES (?,?,?,?)";

    //paso 2: preparar la consulta sql oara su ejecucion
    $sentencia = $conexion ->prepare($sql);

    //paso 3: viculamos los parametros de la consulta preparada con los valores de las variables correspondientes.
    $sentencia ->bindParam(1,$nombre, PDO::PARAM_STR);
    $sentencia ->bindParam(2,$apellidos,PDO::PARAM_STR);
    $sentencia ->bindParam(3,$edad,PDO::PARAM_INT);
    $sentencia ->bindParam(4,$idVuelo,PDO::PARAM_INT);

    //paso 4: ejecutar a consulta preparada
    $result = $sentencia->execute();

    if($result){
        echo "<br> Registo insertado correctamnete <br>";
    }else{
        echo "<br>Errror al insertar<br>";
    } 

    

?> 