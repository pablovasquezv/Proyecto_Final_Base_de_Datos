<?php
//Incluimos la conexión.
require_once('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//Llamos al método conectar.
$llamarMetodo = $con->Conectar();
//insercion de datos en la base de a
 $codigo_Alumno = $_POST['txt_codigo_Alumno'];
 $codigo_Apoderado = $_POST['txt_codigo_Apoderados'];
 $rut = $_POST['txt_Rut'];
 $nombres = $_POST['txt_Nombres'];
 $apellido_Paterno = $_POST['txt_Apellido_Paterno'];
 $apellido_Materno = $_POST['txt_Apellido_Materno'];
 $fecha_Nacimiento_YYYYMMDD = $_POST['txt_Fecha_Nacimiento'];
 $sexo = $_POST['txt_Sexo'];
 $calle = $_POST['txt_Calle'];
 $numero = $_POST['txt_Numero'];
 $ciudad = $_POST['txt_Ciudad'];
 //Convert it into a timestamp.
$timestamp = strtotime($fecha_Nacimiento_YYYYMMDD);

//Convert it to DD-MM-YYYY
$fecha_Nacimiento = date("d-m-Y", $timestamp);
 
//Creamos la consulta de Insercion
$sql = "INSERT INTO ALUMNOS
(ID_ALUMNO,CODIGO_APODERADO,
RUT,NOMBRES,
APELLIDO_PATERNO,
APELLIDO_MATERNO,
FECHA_NACIMIENTO,
SEXO,CALLE,NUMERO,CIUDAD)
 VALUES
 (
'$codigo_Alumno',
'$codigo_Apoderado',
'$rut',
'$nombres',
'$apellido_Paterno',
'$apellido_Materno',
'$fecha_Nacimiento',
'$sexo',
'$calle',
'$numero',
'$ciudad')";
//Realizamos la inserción
$stmt = $llamarMetodo->prepare($sql);
//Ejecutamos la consulta
$stmt->execute();
 //Creamos un ciclo If para verificar la inserción
 if($stmt){
     echo"Datos guardados";

 } else{
     echo "No se realizo la Insercion erro capa 8";
 }
