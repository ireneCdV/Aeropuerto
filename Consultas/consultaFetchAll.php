<?php
    include_once '../Conecta/conexion.php';
    $conexion = Conexion::obtenerConexion();

    $sql = "Select * from pasajero";
    $sentencia = $conexion ->prepare($sql);
    
    //Para leer necesito elegir el tipo de dato que queremos como salida
    //Para ello, hay varias constantes que determinan los distintos tipos:
    // - PDO::ASSOC: me devuelve un array indexado por los array de las columnas.
    // - PDO::NUM: me devuelve un array indexsado por numero de columna.
    // - PDO::BOTH: valor por defecto. Devuelve un array indexado por columnas y por numeros.
    $sentencia->setFetchMode(PDO::FETCH_NUM);

    $result = $sentencia->execute();

    $datos=$sentencia->fetchAll();


    foreach($datos as $fila){
        echo "<br> ID: ".$fila[0];
        echo "<br> Nombre: ".$fila[1];
        echo "<br> Apellidos: ".$fila[2];
        echo "<br> Edad: ".$fila[3];
        echo "<br> IdVuelo: ".$fila[4];
        echo "<br> ";
    }


?>