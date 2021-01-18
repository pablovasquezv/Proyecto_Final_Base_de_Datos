<?php
//Incluimos la conexion
 require_once ('conexion.php');
 //CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
 $con = new Conexion();
//llamamos al método conectar
 $llamarMetodo = $con->Conectar();
 //variable 
 $idDerpartamento = $_POST['D_DEPARTAMENTO'];
 //Creamos la consulta de eliminacio
 $sql ="DELETE FROM DEPARTAMENTOS WHERE D_DEPARTAMENTO='$idDerpartamento'";
 //Relizamos la insercion
 $stmt = $llamarMetodo->prepare($sql);
 //Ejecutamos la consulta
 $stmt->execute();
 //Creamos un ciclo If para verificar la inserción
 /*if($stmt){
     echo"Datos Eliminado correctamente";
 } else{
     echo "No se realizo la Insercion erro capa 8";
 }*/
?>