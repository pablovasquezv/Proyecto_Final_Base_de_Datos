<?php
//Incluimos la conexión.
require_once('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//Llamos al método conectar.
$llamarMetodo = $con->Conectar();
//insercion de datos en la base de a
$codigo_Sucursal = $_POST['txt_Codigo_Matricula'];
$codigo_Producto = $_POST['txt_codigo_Alumnos'];
$fecha_Matricula_YYYYMMDD = $_POST['txt_fecha'];
 //Convert it into a timestamp.
 $timestamp = strtotime($fecha_Matricula_YYYYMMDD);

 //Convert it to DD-MM-YYYY
 $fecha_Matricula = date("d-m-Y", $timestamp);
//Creamos la consulta de Insercion
$sql = "INSERT INTO MATRICULAS (ID_MATRICULAS,CODIGO_ALUMNO,FECHA)
 VALUES(
'$codigo_Sucursal',
'$codigo_Producto',
' $fecha_Matricula')";
//Realizamos la inserción
$stmt = $llamarMetodo->prepare($sql);
//Ejecutamos la consulta
$stmt->execute();
 /*Creamos un ciclo If para verificar la inserción
 if($stmt){
     echo"Datos guardados";

 } else{
     echo "No se realizo la Insercion erro capa 8";
 }*/
