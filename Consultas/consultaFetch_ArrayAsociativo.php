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
    $sentencia->setFetchMode(PDO::FETCH_ASSOC);

    $result = $sentencia->execute();

    while($fila = $sentencia->fetch()){
        echo "<br> ID: ".$fila["idPasajero"];
        echo "<br> Nombre: ".$fila["nombre"];
        echo "<br> Apellidos: ".$fila["apellidos"];
        echo "<br> Edad: ".$fila["edad"];
        echo "<br> IdVuelo: ".$fila["idVuelo"];
        echo "<br> ";
    }

    


?>