<?php
//Incluimos la conexion
require_once('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//llamamos al método conectar
$llamarMetodo = $con->Conectar();
//variable 
$idCurso = $_POST['ID_CURSO'];
$sql="DELETE FROM CURSOS
WHERE ID_CURSO ='$idCurso'";    
//Realizamos la inserción.
$stmt = $llamarMetodo->prepare($sql);
//Ejecutamos la consulta.
$stmt->execute();
 /*
 //Creamos la consulta de eliminación.
 //$sql ="DELETE FROM PRODUCTO WHERE P_PRODUCTO ='$idProducto'";
 //Realizamos la eliminación.
 $stmt = $llamarMetodo->prepare($sql);
 //Ejecutamos la consulta
 $stmt->execute();
 //Creamos un ciclo If para verificar la inserción
 /*if($stmt){
     echo"Datos Eliminado correctamente";
 } else{
     echo "No se realizo la Insercion erro capa 8";
 }*/
