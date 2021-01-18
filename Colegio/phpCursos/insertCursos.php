<?php
//Incluimos la conexión.
require_once('conexion.php');
//CREAMOS UN OBJETO DE LA CLASE CONEXIÓN.
$con = new Conexion();
//Llamos al método conectar.
$llamarMetodo = $con->Conectar();
//insercion de datos en la base de a
 $codigo_Curso = $_POST['txt_codigo_Curso'];
 $codigo_Sala = $_POST['txt_codigo_Sala'];
 $matricula = $_POST['txt_codigo_Matriculas'];
 $alumno = $_POST['txt_codigo_Alumno'];
 $profesor = $_POST['txt_codigo_Profesor'];
 $nombre = $_POST['txt_Nombre'];
//Creamos la consulta de Insercion
$sql = "INSERT INTO CURSOS
(ID_CURSO,
CODIGO_SALA,
CODIGO_MATRICULA,
CODIGO_ALUMNO,
C_PROFESOR_JEFE,
NOMBRE
)
 VALUES
 (
'$codigo_Curso',
'$codigo_Sala',
'$matricula',
'$alumno',
'$profesor',
'$nombre'
  )";
//Realizamos la inserción
$stmt = $llamarMetodo->prepare($sql);
//Ejecutamos la consulta
$stmt->execute();
 //Creamos un ciclo If para verificar la inserción
 /*if($stmt){
     echo"Datos guardados";

 } else{
     echo "No se realizo la Insercion erro capa 8";
 }*/
