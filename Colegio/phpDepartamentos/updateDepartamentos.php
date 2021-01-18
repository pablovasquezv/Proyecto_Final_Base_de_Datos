<?php
//Incluimos la conexion
require_once('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//llamamos al método conectar
$llamarMetodo = $con->Conectar();
//insercion de datos en la base de a
$idDepartamentos = $_POST['D_DEPARTAMENTO'];
$nombre = $_POST['txt_mdNombreDepartamentos'];
//Creamos la consulta de actualizacion
$sql = "UPDATE DEPARTAMENTOS SET 
 D_DESCRIPCION ='$nombre' 
 WHERE D_DEPARTAMENTO ='$idDepartamentos'";
//Relizamos la insercion
$stmt = $llamarMetodo->prepare($sql);
//Ejecutamos la consulta
$stmt->execute();
 //Creamos un ciclo If para verificar la inserción
 /*if($stmt){
     echo"Datos Actualizados correctamente";
 } else{
     echo "No se realizo la Insercion erro capa 8";
 }*/
